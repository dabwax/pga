<?php
App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
    public $uses = array("User", "Student");

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow("ajax_check_username");
    }

    public function ajax_check_username() {
        $this->layout = "ajax";

        $email = $_POST["email"];

        // verifica se o usuário é admin
        $users = $this->User->find("all", array(
            "conditions" => array(
            "User.username" => $email,
            "User.role" => "admin"
            )
        ) );

        if(!empty($users)) {
            echo json_encode(array("status" => "sucesso", "message" => ""));
            die();
        }

        // verifica se existe algum ator com este usuário
        $actors = $this->User->getActors($email);

        if(!empty($actors)) {

            foreach($actors as $a) {
                if(empty($a["password"])) {
                    echo json_encode(array("status" => "sucesso", "message" => "", "tipo" => "sem_senha"));
                    die();
                } else {
                    echo json_encode(array("status" => "sucesso", "message" => ""));
                }
            }
        } else {
            echo json_encode(array("status" => "erro", "message" => "E-mail não está cadastrado."));
            die();
        }

        die();
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
                    $actor[$model]["model"] = $model;
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

            // redirecionar para home
            return $this->redirect( array("controller" => "pages", "action" => "index") );
        }

        if(empty($actors)) {
            $this->Session->setFlash("Não há atores para você.");
            return $this->redirect( array("action" => "login") );
        }

        // buscar todos os estudantes dos atores
        foreach($actors as $k => $a) {

            $model = $this->User->getActorInfo($a["actor"], "model");
            $prefix = $this->User->getActorInfo($a["actor"], "prefix");

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
                    return $this->redirect( array("controller" => "admin", "action" => "index", "plugin" => "admin") );
                }
            }

            $actors = $this->User->getActors($email);

            // verificar quais atores estão com a senha correta
            foreach($actors as $a_key => $a) {

                if(!empty($a["password"])) {
                    $hasher = new BlowfishPasswordHasher();

                    $result = $hasher->check($password, $a["password"]);

                    if(!$result) {
                        unset($actors[$a_key]);
                    }
                // não há senha para este ator
                } else {
                    $model = $this->User->getActorInfo($a["actor"], "model");
                    $prefix = $this->User->getActorInfo($a["actor"], "prefix");

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

                    // atualiza a senha do ator
                    $this->$model->save( array(
                        "id" => $a["id"],
                        $prefix . "password" => $password
                    ) );
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