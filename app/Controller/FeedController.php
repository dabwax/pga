<?php
/**
 * Páginas envolvendo feed encontram-se aqui.
 */
class FeedController extends AppController {

    public function index() {
        $this->layout = "ajax";

        $date_start = $this->Session->read("date_start");
        $date_finish = $this->Session->read("date_finish");
        $s = $this->Session->read("s");

        $conditions = array(
            "Feed.student_id" => AuthComponent::user("Student.Student.id")
        );

        if(!empty($date_start) && !empty($date_finish)) {
            $conditions['Feed.date >='] = $date_start->format("Y-m-d");
            $conditions['Feed.date <='] = $date_finish->format("Y-m-d");

            $this->Session->delete("date_start");
            $this->Session->delete("date_finish");
        } else {
            $dateTime = new DateTime();

            $date_start     =  new DateTime($dateTime->format("Y-m-") . "01");
            $date_finish    = $dateTime;
            
            $conditions['Feed.date >='] = $date_start->format("Y-m-d");
            $conditions['Feed.date <='] = $date_finish->format("Y-m-d");
        }

        if(!empty($s)) {
            $conditions['Feed.content LIKE'] = '%' . $s . '%';

            $this->Session->delete("s");
        }

        $this->set(compact("date_start", "date_finish"));

        $feed = $this->Feed->find("all", array(
            "limit" => 100,
            "conditions" => $conditions,
            "order" => "Feed.date DESC, Feed.created DESC"
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

        if(!empty($f['Feed']['content'])) {
            foreach($f['Feed']['content'] as $c) {
                $student_input_value_ids[] = $c['student_input_value_id'];
            }
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

        $this->set(compact("student_input_values", "actor", "student_id", "id"));

        if($this->request->is("post")) {
            $date = $this->request->data['StudentInputValue']['date'];

            $content = array();

            foreach($this->request->data['StudentInputValue'] as $x => $siv) {
                if(is_numeric($x)) {
                    $this->StudentInputValue->save(array(
                        'id' => $siv['id'],
                        'value' => $siv['value'],
                        'date' => $date,
                    ));

                    foreach($student_input_values as $siv2) {
                        if($siv2['StudentInputValue']['id'] == $siv['id']) {
                            $tmp = $siv2['StudentInputValue'];
                        }
                    }

                    $tmp = array_merge($tmp, array('value' => $siv['value'], 'date' => $date, 'student_input_value_id' => $siv['id']) );

                    $content[] = $tmp;
                }
            }

            $this->Feed->save(array(
                'id' => $f['Feed']['id'],
                'content' => $content,
                'date' => $date
            ));

        $this->Session->setFlash(__("O feed foi editado com sucesso."), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-success'
        ));

        return $this->redirect( array("action" => "edit", $id) );
        }
    }

    public function delete($id = null) {
        $this->Feed->id = $id;
        $Feed = $this->Feed->read();

        if (!$this->Feed->exists()) {
            throw new NotFoundException(__('Invalid Feed'));
        }
        if ($this->Feed->delete()) {
            $this->Session->setFlash(__('O feed foi removido.'));
        } else {
            $this->Session->setFlash(__('Não foi possível removido o feed.'));
        }
        return $this->redirect(array('action' => 'edit', $id));
    }
}