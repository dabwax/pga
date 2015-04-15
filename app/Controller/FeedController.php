<?php
/**
 * Páginas envolvendo feed encontram-se aqui.
 */
class FeedController extends AppController {

    public function index() {
        $this->layout = "ajax";
        $feed = $this->Feed->find("all", array(
            "limit" => 100,
            "conditions" => array(
                "Feed.student_id" => AuthComponent::user("Student.Student.id")
            ),
            "order" => array(
                "Feed.created DESC",
                "Feed.date DESC"
            )
        ) );
        $student_inputs = $this->Feed->Student->StudentInput->find("list");
        $student_lessons = $this->Feed->Student->StudentLesson->find("list");

        $this->set(compact("feed", "student_inputs", "student_lessons"));
    }

    public function edit($id = null) {
        $this->layout = "iframe";

        $f = $this->Feed->find("first", array(
            "conditions" => array(
                "Feed.id" => $id,
            ),
        ) );

        $actor = $this->getActor(AuthComponent::user("Actor"));
        $student_id = AuthComponent::user("Student.Student.id");

        $student_input_value_ids = array();

        foreach($f['Feed']['content'] as $c) {
            $student_input_value_ids[] = $c['student_input_value_id'];
        }

        $this->loadModel("StudentInputValue");
        $options = array(
            'conditions' => array(
                'StudentInputValue.id' => $student_input_value_ids
            ),
            'contain' => array(
                'StudentInput' => array(
                    'Input'
                )
            )
        );
        $student_input_values = $this->StudentInputValue->find("all", $options);

        $this->set(compact("student_input_values", "actor", "student_id"));

        if($this->request->is("post")) {
            foreach($this->request->data['StudentInputValue'] as $siv) {

                $this->StudentInputValue->save(array(
                    'id' => $siv['id'],
                    'value' => $siv['value'],
                ));
            }
        $this->Session->setFlash(__("O feed foi editado com sucesso."), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));

        return $this->redirect( array("action" => "edit", $id) );
        }
    }
}