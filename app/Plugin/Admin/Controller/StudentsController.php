<?php
class StudentsController extends AdminAppController {
    public $uses = array("Student", "Input");

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('students', $this->Student->find("all"));
    }

    public function send_welcome_email($id = null, $actor = null) {
        $this->autoRender = false;

        $options = array(
            'conditions' => array(
                'Student.id' => $id,
            ),
            'contain' => array(
                'StudentPsychiatrist',
                'StudentSchool',
                'StudentParent',
            )
        );
        $this->request->data = $this->Student->find("first", $options);

        $aluno = $this->request->data['Student']['name'];

        if($actor == "psiquiatra") {
            ### PSICO ###
            $nome = $this->request->data["StudentPsychiatrist"]["name"];
            $destinatario = $this->request->data["StudentPsychiatrist"]["email"];
            $ator = "terapeuta";

            $this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);
        }

        if($actor == "mediador") {
            ### MEDIADOR ###
            $nome = $this->request->data["StudentSchool"]["mediator_name"];
            $destinatario = $this->request->data["StudentSchool"]["mediator_email"];
            $ator = "mediador(a)";

            $this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);
        }

        if($actor == "coordenador") {
            ### COORDENADOR ###
            $nome = $this->request->data["StudentSchool"]["coordinator_name"];
            $destinatario = $this->request->data["StudentSchool"]["coordinator_email"];
            $ator = "coordenador(a)";

            $this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);
        }

        if($actor == "pai") {
            ### PAI ###
            $nome = $this->request->data["StudentParent"]["dad_name"];
            $destinatario = $this->request->data["StudentParent"]["dad_email"];
            $ator = "pai";

            $this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);
        }

        if($actor == "mae") {
            ### MAE ###
            $nome = $this->request->data["StudentParent"]["mom_name"];
            $destinatario = $this->request->data["StudentParent"]["mom_email"];
            $ator = "mãe";

            $this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);
        }

        if($actor == "tutor") {
            ### TUTOR ###
            $nome = $this->request->data["StudentParent"]["tutor_name"];
            $destinatario = $this->request->data["StudentParent"]["tutor_email"];
            $ator = "tutor";

            $this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);
        }

        return $this->redirect( array('action' => 'edit', $id) );
    }

    public function download_student_exercise($id = null) {
        $this->autoRender = false;

        $student_exercise = $this->Student->StudentExercise->findById($id);

        $this->response->file(WWW_ROOT.'files'. DS . $student_exercise['StudentExercise']['attachment'], array('download' => true, 'name' => $student_exercise['StudentExercise']['attachment']));
    }

    public function ajax_edit_student_input() {
        $this->layout = "ajax";
        $this->autoRender = false;

        $id = $_POST["id"];
        $value = $_POST["value"];
        $field = $_POST["field"];

        $this->loadModel("StudentInput");

        $this->StudentInput->save(array(
            'id'    =>  $id,
            $field  => $value
        ));

        echo "O nome do input foi alterado.";
    }
/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->saveAll($this->request->data)) {

                $aluno = $this->request->data["Student"]["name"];

                // enviar e-mail para todos os atores

                ### PSICO ###
                $nome = $this->request->data["StudentPsychiatrist"]["name"];
                $destinatario = $this->request->data["StudentPsychiatrist"]["email"];
                $ator = "terapeuta";

                #$this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);

                ### MEDIADOR ###
                $nome = $this->request->data["StudentSchool"]["mediator_name"];
                $destinatario = $this->request->data["StudentSchool"]["mediator_email"];
                $ator = "mediador(a)";

                #$this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);

                ### COORDENADOR ###
                $nome = $this->request->data["StudentSchool"]["coordinator_name"];
                $destinatario = $this->request->data["StudentSchool"]["coordinator_email"];
                $ator = "coordenador(a)";

                #$this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);

                ### PAI ###
                $nome = $this->request->data["StudentParent"]["dad_name"];
                $destinatario = $this->request->data["StudentParent"]["dad_email"];
                $ator = "pai";

                #$this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);

                ### MAE ###
                $nome = $this->request->data["StudentParent"]["mom_name"];
                $destinatario = $this->request->data["StudentParent"]["mom_email"];
                $ator = "mãe";

                #$this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);

                ### TUTOR ###
                $nome = $this->request->data["StudentParent"]["tutor_name"];
                $destinatario = $this->request->data["StudentParent"]["tutor_email"];
                $ator = "tutor";

                #$this->Student->sendWelcomeEmail($nome, $ator, $aluno, $destinatario);

                $this->Session->setFlash(__('The student has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'));
            }
        }
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Student->saveAll($this->request->data)) {
                $this->Session->setFlash(__('O estudante foi atualizado com sucesso!'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível atualizar o estudante no momento. Tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
            $this->request->data = $this->Student->find('first', $options);
        }

        $atores = array(
            "Tutor",
            "Psico",
            "Escola",
            "Pais",
            "Aluno"
        );

        $inputs = $this->Input->find("all");
        $options = array(
            'conditions' => array(
                'Input.name !=' => array('Texto', 'Texto Privativo')
            )
        );
        $inputs_o = $this->Input->find("list", $options);


        $this->loadModel("StudentLesson");

        $options = array(
            'conditions' => array(
                'StudentLesson.student_id' => $id
            )
        );
        $lessons_o = $this->StudentLesson->find("list", $options);

        $options = array(
            'fields' => array(
                'StudentInput.id',
                'StudentInput.name'
            )
        );
        $options_inputs = $this->Student->StudentInput->find("list", $options);
        $options = array(
            'fields' => array(
                'StudentLesson.id',
                'StudentLesson.name'
            ),
            'conditions' => array(
                'StudentLesson.student_id' =>$id
            ),
            'order' => array(
                'StudentLesson.name ASC'
            )
        );
        $options_lessons = $this->Student->StudentLesson->find("list", $options);

        $student_inputs = $this->Student->StudentInput->find("all", array(
            "conditions" => array(
                "StudentInput.student_id" => $id
            ),
            "contain" => array(
                "Input"
            ),
            "order" => array(
                "StudentInput.order ASC"
            )
        ) );

        $student_lessons = $this->Student->StudentLesson->find("all", array(
            "conditions" => array(
                "StudentLesson.student_id" => $id
            ),
            'order' => array(
                'StudentLesson.name ASC'
            )
        ) );

        $student_exercises = $this->Student->StudentExercise->find("all", array(
            "conditions" => array(
                "StudentExercise.student_id" => $id
            ),
        ) );

        $conditions = array(
            "StudentInputValue.student_id" => $id
        );

        $aulas = $this->Student->StudentInput->StudentInputValue->findGroup($id, $conditions);

        $o_student_lessons = $options_lessons;

        $this->loadModel("Admin.Chart");

        $options = array(
            'conditions' => array(
                'Chart.student_id' => $id
            ),
            'contain' => array(
                'ChartStudentInput' => array(
                    'StudentInput' => array(
                        'Input'
                    )
                )
            ),
            'order' => array(
                'Chart.order ASC'
            )
        );
        $charts = $this->Chart->find("all", $options);

        $student_inputs_o = array();

        foreach($charts as $chart) {

            $options = array(
                'conditions' => array(
                    'StudentInput.student_id' => $chart['Chart']['student_id'],
                    'StudentInput.input_id' => $chart['Chart']['input_id'],
                )
            );

            $tmp = $this->Chart->Student->StudentInput->find("all", $options);

            foreach($tmp as $t) {

                if(!in_array($t['StudentInput']['id'], $student_inputs_o)) {
                    $chart_id = $chart['Chart']['id'];
                    $student_input_id = $t['StudentInput']['id'];

                    $student_inputs_o[$chart_id][$student_input_id] = $t['StudentInput']['name'] . ' (' . $t['StudentInput']['actor'] . ')';
                }
            }

        } // fim - charts

        $houve_criacao = $this->Session->read("houve_criacao");

        if($houve_criacao) {
            $this->Session->delete("houve_criacao");

            $this->set(compact("houve_criacao"));
        }

        $this->set(compact("lessons_o", "student_inputs_o", "inputs_o", "charts", "options_inputs", "options_lessons", "atores", "inputs", "student_inputs", "aulas", "student_lessons", "o_student_lessons", "student_exercises"));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        if ($this->Student->delete()) {
            $this->Session->setFlash(__('O estudante foi removido.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o estudante.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function add_student_exercise() {

        if($this->request->is("post")) {

            $this->Student->StudentExercise->create();

            $this->Student->StudentExercise->save($this->request->data);

            $this->Session->setFlash(__('O novo exercício foi salvo.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));

            return $this->redirect( array("action" => "edit", $this->request->data["StudentExercise"]["student_id"], "#" => "exercicios") );

        } // - post

    }

    public function edit_student_exercise($id = null) {

        if($this->request->is("post")) {

            $this->request->data['StudentExercise']['id'] = $id;

            $this->Student->StudentExercise->save($this->request->data);

            $this->Session->setFlash(__('O exercício foi editado.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));

            return $this->redirect( array("action" => "edit", $this->request->data["StudentExercise"]["student_id"], "#" => "exercicios") );

        } // - post

    }

    public function add_input($input_id, $student_id, $actor) {
        $this->layout = "iframe";

        if($this->request->is("post")) {

            $this->Student->StudentInput->create();

            // limpa o array de config
            // apenas por organização
            if(!empty($this->request->data["StudentInput"]["config"])) {
                foreach($this->request->data["StudentInput"]["config"] as $k => $i) {
                    if(is_int($k)) {
                        if(empty($i["name"])) {
                            unset($this->request->data["StudentInput"]["config"][$k]);
                        }
                    }
                }
            }

            $dados = array(
                "student_id" => $student_id,
                "input_id" => $input_id,
                "actor" => strtolower($actor),
                "config" => @$this->request->data["StudentInput"]["config"],
                "name" => $this->request->data["StudentInput"]["name"]
            );

            $this->Student->StudentInput->save($dados);

            $this->Session->setFlash(__('O novo input foi salvo.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));

        } // - post

        $input = $this->Input->findById($input_id);
        $student = $this->Student->findById($student_id);

        $this->set(compact("input", "student"));
    }

    public function add_student_lesson() {

        if($this->request->is("post")) {

            $this->Student->StudentLesson->create();

            $this->Student->StudentLesson->save($this->request->data);

            $this->Session->setFlash(__('A nova disciplina foi salva.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));

            return $this->redirect( array("action" => "edit", $this->request->data["StudentLesson"]["student_id"], "#" => "materias") );

        } // - post

        $input = $this->Input->findById($input_id);
        $student = $this->Student->findById($student_id);

        $this->set(compact("input", "student"));
    }

    public function delete_student_input($student_input_id, $student_id) {
        $this->Student->StudentInput->id = $student_input_id;

        $si = $this->Student->StudentInput->read();

        $this->Student->StudentInput->delete($student_input_id);

        $this->Session->setFlash(__('O input foi deletado.'));

        return $this->redirect( array("action" => "edit", $student_id, "#" => $si['StudentInput']['actor']) );
    }

    public function delete_student_lesson($student_lesson_id, $student_id) {
        $this->Student->StudentLesson->delete($student_lesson_id);

        $this->Session->setFlash(__('A disciplina foi deletada.'));

        return $this->redirect( array("action" => "edit", $student_id, "#" => "materias") );
    }

    public function add_student_input_value() {

        if($this->request->is("post")) {

            $input_date = null;

            // adiciona os inputs
            foreach($this->request->data["StudentInputValue"] as $input_value) {

                if(!empty($input_value["value"]) && !empty($input_value["student_input_id"])) {

                    $input_value["date"] = $this->request->data["StudentInputValue"]["date"];

                    $input_date = $input_value["date"];

                    $this->Student->StudentInput->StudentInputValue->create();

                    $this->Student->StudentInput->StudentInputValue->save($input_value);

                }

            }

            // limpa o array de matérias
            // apenas por organização
            foreach($this->request->data["StudentInputValue"] as $k => $input_value) {
                if(empty($input_value["value"])) {
                    unset($this->request->data["StudentInputValue"][$k]);
                }
            }

            // adiciona as matérias
            foreach($this->request->data["StudentInputValue"] as $input_value) {

                if(!empty($input_value["value"]) && !empty($input_value["student_lesson_id"])) {

                    $input_value["date"] = $input_date;

                    $this->Student->StudentInput->StudentInputValue->create();

                    $this->Student->StudentInput->StudentInputValue->save($input_value);

                }

            }
        }

        $this->Session->setFlash(__('O novo registro de input foi salvo.'));

        return $this->redirect( array("controller" => "students", "action" => "edit", $this->request->data["StudentInputValue"][0]["student_id"], "#" => "conteudo") );
    }

    public function delete_student_exercise($student_exercise_id, $student_id) {
        $this->Student->StudentExercise->delete($student_exercise_id);

        $this->Session->setFlash(__('O exercício foi deletado.'));

        return $this->redirect( array("action" => "edit", $student_id, "#" => "exercicios") );
    }
}