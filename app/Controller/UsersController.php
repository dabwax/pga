<?php
App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
    public $uses = array("User", "Student");

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    // página para definir qual ator o usuário quer usar
    public function set_student($student_id = null, $actor_id = null) {
        $actors = $this->Session->read("actors");

        // já foi selecionado o estudante
        if(!empty($student_id)) {
            // buscar o usuário padrão de ator
            $default_user = $this->User->find("first", array(
                "conditions" => array(
                    "User.role" => "actor"
                )
            ) );

            // busca qual dos estudantes ele selecionou
            $student = $this->Student->find("first", array(
                "conditions" => array(
                    "Student.id" => $student_id
                ),
                "contain" => array(
                    "StudentParent",
                    "StudentPsychiatrist",
                    "StudentSchool"
                )
            ) );

            // (???) atualiza os atores
            $actors = $this->Session->read("actors");

            // busca qual dos atores ele selecionou
            
            // gambiarra - 1
            $model = null;
            $prefix = null;

            foreach($actors as $a) {
                if($a["id"] == $actor_id) {
                    // gambiarra - 2
                    $model = $a["model"];
                    $prefix = $a["prefix"];

                    $actor = $this->Student->$a["model"]->find("first", array(
                        "conditions" => array(
                            $a["model"] . ".id" => $actor_id
                        )
                    ) );

                    // gambiarra - 3
                    $actor[$model]["prefix"] = $prefix;
                }
            }

            // juntar o usuário padrão com os dados do estudante e do ator selecionado
            $session_data = array(
                "User" => $default_user["User"],
                "Student" => $student,
                // gambiarra - fim
                "Actor" => $actor[$model]
            );

            // fazer um login manual com ambos os dados
            $this->Auth->login($session_data);

            // redirecionar para dashboard
            return $this->redirect( array("controller" => "pages", "action" => "dashboard") );
        }

        if(empty($actors)) {
            $this->Session->setFlash("Não há atores para você.");
            return $this->redirect( array("action" => "login") );
        }

        // buscar todos os estudantes dos atores
        foreach($actors as $k => $a) {
            switch($a["actor"]) {
                case "mae":
                    $model = "StudentParent";
                    $prefix = "mom_";
                    break;
                case "pai":
                    $model = "StudentParent";
                    $prefix = "dad_";
                    break;
                case "tutor":
                    $model = "StudentParent";
                    $prefix = "tutor_";
                    break;
                case "psiquiatra":
                    $model = "StudentPsychiatrist";
                    $prefix = "";
                    break;
                case "mediador":
                    $model = "StudentSchool";
                    $prefix = "mediator_";
                    break;
                case "coordenador":
                    $model = "StudentSchool";
                    $prefix = "coordinator_";
                    break;
            }
            // importa o model do ator
            $this->uses = array($model);

            // busca o ator pelo id
            $data = $this->$model->find(
                "first",
                array(
                    "conditions" => 
                        array($model . ".id" => $a["id"]),
                    "contain" => 
                        array("Student")
                )
            );

            // armazena o model e o prefixo por segurança
            $actors[$k]["model"] = $model;
            $actors[$k]["prefix"] = $prefix;

            // armazena o ator dentro da chave do model
            $actors[$k][$model] = $data[$model];

            // armazena o estudante do ator dentro da chave do model
            $actors[$k][$model]["Student"] = $data["Student"];
        }

        // atualiza a sessão de atores com o model e o prefixo deles
        $this->Session->delete("actors");
        $this->Session->write("actors", $actors);

        $this->set(compact("actors"));
    }

    public function login() {
        $this->layout = "login";
        
        if ($this->request->is('post')) {

            // shortcut
            $email = $this->request->data["User"]["username"];
            $password = $this->request->data["User"]["password"];
            $hasher = new BlowfishPasswordHasher();
            // senha preenchida em blowfish
            $passwordHashed = $hasher->hash($password);

            // verifica se o usuário é admin

            $users = $this->User->find("all", array(
                "conditions" => array(
                    "User.username" => $email,
                    "User.role" => "admin"
                )
            ) );

            foreach($users as $u) {
                // checa se a senha inserida é a mesma que a senha do usuário
                $result = $hasher->check($password, $u["User"]["password"]);

                // se for a mesma senha, redireciona ele para o admin
                if($result) {
                    // força o login
                    $this->Auth->login();

                    // redireciona para a dashboard de admin
                    return $this->redirect( array("controller" => "pages", "action" => "admin_dashboard", "admin" => true) );
                }
            }

            // verifica se o usuário inserido no form
            // é um ator de algum aluno - ### INÍCIO ###

            // array com os possíveis atores
            $actors = array();

            // primeiro eu busco todos os pais
            $parents = $this->Student->StudentParent->find("all", array(
                "conditions" => array(
                    "OR" => array(
                        "StudentParent.mom_email" => $email,
                        "StudentParent.dad_email" => $email,
                        "StudentParent.tutor_email" => $email,
                    )
                )
            ) );

            // verifico se tem algum pai como ator e adiciono
            foreach($parents as $p) {
                
                if(!empty($p["StudentParent"]["mom_email"]) && $p["StudentParent"]["mom_email"] == $email) {
                    $actor = "mae";

                    $actors[] = array("actor" => $actor, "id" => $p["StudentParent"]["id"], "password" => $p["StudentParent"]["mom_password"]);
                }

                if(!empty($p["StudentParent"]["dad_email"]) && $p["StudentParent"]["dad_email"] == $email) {
                    $actor = "pai";

                    $actors[] = array("actor" => $actor, "id" => $p["StudentParent"]["id"], "password" => $p["StudentParent"]["dad_password"]);
                }

                if(!empty($p["StudentParent"]["tutor_email"]) && $p["StudentParent"]["tutor_email"] == $email) {
                    $actor = "tutor";

                    $actors[] = array("actor" => $actor, "id" => $p["StudentParent"]["id"], "password" => $p["StudentParent"]["tutor_password"]);
                }
            }

            // após buscar os pais, agora vou consultar os psiquiatras
            $psychiatrists = $this->Student->StudentPsychiatrist->find("all", array(
                "conditions" => array(
                    "StudentPsychiatrist.email" => $email,
                )
            ));

            // verifico se tem algum psiquiatra como ator e adiciono
            foreach($psychiatrists as $p) {
                
                if(!empty($p["StudentPsychiatrist"]["email"])) {
                    $actor = "psiquiatra";
                }

                $actors[] = array("actor" => $actor, "id" => $p["StudentPsychiatrist"]["id"], "password" => $p["StudentPsychiatrist"]["password"]);
            }

            // após buscar os psiquiatras, agora vou consultar as escolas
            $schools = $this->Student->StudentSchool->find("all", array(
                "conditions" => array(
                    "OR" => array(
                        "StudentSchool.mediator_email" => $email,
                        "StudentSchool.coordinator_email" => $email,
                    )
                )
            ));

            // verifico se tem alguma escola como ator e adiciono
            foreach($psychiatrists as $p) {
                
                if(!empty($p["StudentSchool"]["mediator_email"])) {
                    $actor = "mediador";

                    $actors[] = array("actor" => $actor, "id" => $p["StudentSchool"]["id"], "password" => $p["StudentSchool"]["mediator_password"]);
                } else if(!empty($p["StudentSchool"]["coordinator_email"])) {
                    $actor = "coordenador";

                    $actors[] = array("actor" => $actor, "id" => $p["StudentSchool"]["id"], "password" => $p["StudentSchool"]["coordinator_password"]);
                }
            }

            // verificar quais atores estão com a senha correta
            foreach($actors as $a_key => $a) {
                
                $hasher = new BlowfishPasswordHasher();

                $result = $hasher->check($password, $a["password"]);

                if(!$result) {
                    unset($actors[$a_key]);
                }
            }

            // se houver algum ator com o e-mail selecionado
            if(!empty($actors)) {

                // obs: armazeno os atores na sessão para usar na set_student
                $this->Session->write("actors", $actors);

                // redireciono para a página de escolha do estudante
                return $this->redirect( array("action" => "set_student") );
            // se não houver nenhum ator
            } else {
                $this->Session->setFlash("Não há nenhum ator com este e-mail.");
            }

        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}