<?php
/**
 * Páginas envolvendo evolução encontram-se aqui.
 */
class EvolutionController extends AppController {

	public function index() {
		$this->layout = "ajax";
		$this->set("title_for_layout", "Evolução do Aluno");
	}
}