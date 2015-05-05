<?php
class HashtagsController extends AppController {
    
    public function lightbox($student_id = null, $student_input_id = null, $tipo = "input") {
        $this->layout = "iframe";
        
        $options = array(
            'conditions' => array(
                'Hashtag.student_id' => $student_id
            )
        );

        $hashtags = $this->Hashtag->find("all", $options);

        $this->set(compact("hashtags", "student_input_id", "tipo"));
    }
}