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
}