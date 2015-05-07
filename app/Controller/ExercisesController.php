<?php
class ExercisesController extends AppController {
    public $uses = array("Student");

    public function index() {
        $this->layout = "ajax";

        $id = AuthComponent::user("Student.Student.id");

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

        $o_student_lessons = $options_lessons;
        
        $student_exercises = $this->Student->StudentExercise->find("all", array(
            "conditions" => array(
                "StudentExercise.student_id" => $id
            ),
        ) );

        $this->set(compact("student_inputs_o", "inputs_o", "charts", "options_inputs", "options_lessons", "atores", "inputs", "student_inputs", "aulas", "student_lessons", "o_student_lessons", "student_exercises"));
        
        if($this->request->is("get")) {
            $student = $this->Student->findById(AuthComponent::user("Student.Student.id"));

            $this->request->data['Student'] = $student['Student'];
        }
    }

    public function edit($exercise_id) {
        $this->layout = "iframe";

        $id = AuthComponent::user("Student.Student.id");

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

        $o_student_lessons = $options_lessons;
        
        $student_exercises = $this->Student->StudentExercise->find("first", array(
            "conditions" => array(
                "StudentExercise.id" => $exercise_id
            ),
        ) );

        $this->set(compact("student_inputs_o", "inputs_o", "charts", "options_inputs", "options_lessons", "atores", "inputs", "student_inputs", "aulas", "student_lessons", "o_student_lessons", "student_exercises"));
        
        if($this->request->is("get")) {
            $this->request->data = $student_exercises;
            $s_e = $student_exercises;
            $this->set(compact("s_e"));
        } else {

            $this->request->data['StudentExercise']['id'] = $exercise_id;
            $this->Student->StudentExercise->save($this->request->data);

            $this->Session->setFlash(__('O exercício foi editado.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
            return $this->redirect( array('action' => 'edit', $exercise_id));
        }
    }

    public function add_student_exercise() {

        if($this->request->is("post")) {

            $this->Student->StudentExercise->create();

            $this->Student->StudentExercise->save($this->request->data);

            $this->Session->setFlash(__('O novo exercício foi salvo.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));

            return $this->redirect("/#exercicios");

        } // - post

    }
}