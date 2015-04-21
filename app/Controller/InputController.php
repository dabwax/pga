<?php
/**
 * Páginas envolvendo input encontram-se aqui.
 */
class InputController extends AppController {
    public $uses = array("Student", "Feed");

    /**
     * Página Inicial.
     */
    public function index() {
        $this->layout = "ajax";
        $this->set("title_for_layout", "Inputs");   
    }

    /**
     * Página de Criar Novo Registro.
     */
    public function create() {
        $this->layout = "ajax";
        $this->set("title_for_layout", "Criar Novo Input");

        $actor = $this->getActor(AuthComponent::user("Actor"));
        $student_id = AuthComponent::user("Student.Student.id");

        // Busca todos os inputs para o estudante
        $student_inputs = $this->Student->StudentInput->find("all", array(
            "conditions" => array(
                "StudentInput.student_id" => AuthComponent::user("Student.Student.id"),
                "StudentInput.actor" => $actor
            ),
            "contain" => array(
                "Input"
            ),
            "order" => array(
                "StudentInput.order ASC"
            )
        ) );

        // busca todas as matérias do estudante
        $student_lessons = $this->Student->StudentLesson->find("all", array(
            "conditions" => array(
                "StudentLesson.student_id" => AuthComponent::user("Student.Student.id")
            ),
        ) );

        $last_entry = $this->Student->StudentInput->StudentInputValue->find("first", array(
            "conditions" => array(
                "StudentInputValue.date" => date("d/m/Y"),
                "StudentInputValue.actor" => $actor
            ),
            "order" => array(
                "StudentInputValue.id DESC"
            )
        ) );

        if(!empty($last_entry)) {
            $has_input = true;
        } else {
            $has_input = false;
        }

        $this->set(compact("student_id", "student_inputs", "student_lessons", "actor", "has_input"));
    }

    /**
     * Página de Arquivo.
     */
    public function archive() {
        $this->layout = "ajax";
        $this->set("title_for_layout", "Arquivo de Inputs");


        $date_start = $this->Session->read("date_start");
        $date_finish = $this->Session->read("date_finish");
        $s = $this->Session->read("s");

        $conditions = array(
            "StudentInputValue.student_id" => AuthComponent::user("Student.Student.id")
        );


        if(!empty($date_start) && !empty($date_finish)) {
            $conditions['StudentInputValue.date >='] = $date_start->format("Y-m-d");
            $conditions['StudentInputValue.date <='] = $date_finish->format("Y-m-d");
        } else {
            $dateTime = new DateTime();

            $date_start     =  new DateTime($dateTime->format("Y-m-") . "01");
            $date_finish    = $dateTime;
            
            $conditions['StudentInputValue.date >='] = $date_start->format("Y-m-d");
            $conditions['StudentInputValue.date <='] = $date_finish->format("Y-m-d");
        }

        if(!empty($s)) {
            $conditions['StudentInputValue.value LIKE'] = '%' . $s . '%';
        }
        $this->set(compact("date_start", "date_finish"));

        $aulas = $this->Student->StudentInput->StudentInputValue->findGroup(AuthComponent::user("Student.Student.id"), $conditions);

        $this->set(compact("aulas"));
    }

    function getHashtags($string) {  
        $hashtags= FALSE;  
        preg_match_all("/(#\w+)/u", $string, $matches);  
        if ($matches) {
            $hashtagsArray = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsArray);
        }
        return $hashtags;
    }

    /**
     * Action de requisição POST da criação de input.
     */
    public function add_student_input_value() {
        $this->layout = "ajax";

        if($this->request->is("post")) {

            $input_date = $this->request->data["StudentInputValue"]["date"];
            unset($this->request->data["StudentInputValue"]["date"]);

            $this->loadModel("Hashtag");

            // adiciona os inputs
            foreach($this->request->data["StudentInputValue"] as $k => $input_value) {

                if(!empty($input_value["value"]) && !empty($input_value["student_input_id"])) {

                    $input_value["date"] = $input_date;
                    
                    if(!empty($input_value["type"]) && $input_value["type"] == "numerico") {
                        $input_value["value"] = str_replace(",", ".", $input_value["value"]);
                    }
                    if(!empty($input_value["type"]) && $input_value["type"] == "texto") {
                        $hashtags = $this->getHashtags($input_value['value']);
                    }

                    $this->Student->StudentInput->StudentInputValue->create();

                    $this->Student->StudentInput->StudentInputValue->save($input_value);

                    $hashtag_ids = array();

                    foreach($hashtags as $h) {
                        $options = array(
                            'conditions' => array(
                                'Hashtag.value' => $h
                            )
                        );
                        $tmp = $this->Hashtag->find("first", $options);

                        if(!empty($tmp)) {
                            $hashtag_ids[] = $tmp['Hashtag']['id'];
                        } else {
                            $tmp = array(
                                'student_id' => $input_value["student_id"],
                                'actor' => $input_value["actor"],
                                'value' => $h,
                                'student_input_value_id' => $this->Student->StudentInput->StudentInputValue->getInsertID(),
                                'student_input_id' => $input_value["student_input_id"],
                            );
                            $this->Hashtag->create();
                            $this->Hashtag->save($tmp);

                            $hashtag_ids[] = $this->Hashtag->getInsertID();
                        }

                        foreach($hashtag_ids as $id) {
                            $this->Hashtag->HashtagStudentInputValue->create();

                            $data = array(
                                'hashtag_id' => $id,
                                'student_input_value_id' => $this->Student->StudentInput->StudentInputValue->getInsertID(),
                                'student_input_id' => $input_value["student_input_id"]
                            );
                            $this->Hashtag->HashtagStudentInputValue->save($data);
                        }
                    }

                    $this->request->data['StudentInputValue'][$k]['student_input_value_id'] = $this->Student->StudentInput->StudentInputValue->getInsertID();

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
            foreach($this->request->data["StudentInputValue"] as $k => $input_value) {

                if(!empty($input_value["value"]) && !empty($input_value["student_lesson_id"])) {

                    $input_value["date"] = $input_date;

                    $this->Student->StudentInput->StudentInputValue->create();

                    $this->Student->StudentInput->StudentInputValue->save($input_value);
                    
                    $this->request->data['StudentInputValue'][$k]['student_input_value_id'] = $this->Student->StudentInput->StudentInputValue->getInsertID();

                }

            }

            CakeLog::write('activity', 'input_date ' . $input_date);

            // joga o input para o feed
            $this->Feed->generate($input_date, $this->request->data["StudentInputValue"]);
        }
        $this->Session->setFlash(__('O novo registro de input foi salvo.'));

        $this->Session->setFlash(__("O novo input foi adicionado ao estudante."), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));

        return $this->redirect( array("controller" => "input", "action" => "archive") );
    }
}