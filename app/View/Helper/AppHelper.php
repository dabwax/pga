<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

	/**
	 * Dicionário dos inputs.
	 *
	 * @return ID do Input no banco de dados.
	 */
	public function getInputId($name = null) {
		switch($name) {
			case "Calendário":
				return 1;
			break;
			case "Intervalo de Tempo":
				return 2;
			break;
			case "Texto":
				return 3;
			break;
			case "Escala Numérica":
				return 4;
			break;
			case "Escala Texto":
				return 5;
			break;
			case "Número":
				return 6;
			break;
			case "Texto Privativo":
				return 7;
			break;
			default:
				return 0;
			break;
		}
	}

	/**
	 * Função de atalho para a action set_student.
	 */
	public function dados($a, $campo, $subcampo = null) {
		
		if($campo == "id")
			$a["prefix"] = null;

		if($campo == "Student")
			return $a[$a["model"]]["Student"][$subcampo];

		return $a[$a["model"]][$a["prefix"] . $campo];
	}

	/**
	 * Função de atalho para recuperar informações do ator logado.
	 *
	 * auxílio mágico - INFO: daltro.inq
	 */
	public function getActorInfo($field = null) {
		$info = "Actor." . AuthComponent::user("Actor.prefix") . "name";

		return AuthComponent::user($info);
	}

	/**
	 * Função de atalho para recuperar o nome do pai e da mãe.
	 */
	public function getParentsName() {
		$student_parents = AuthComponent::user("Student.StudentParent");

		return $student_parents["dad_name"] . " e " . $student_parents["mom_name"];
	}

	/**
	 * Função de atalho para recuperar o nome do pai e da mãe.
	 */
	public function getTutorName() {
		$student_parents = AuthComponent::user("Student.StudentParent");

		return $student_parents["tutor_name"];
	}

	/**
	 * Função de atalho para recuperar o nome do psiquiatra.
	 */
	public function getPsychiatristName() {
		$psychiatrist = AuthComponent::user("Student.StudentPsychiatrist");

		return $psychiatrist["name"];
	}

	/**
	 * Função de atalho para recuperar o nome da escola.
	 */
	public function getSchoolName() {
		$school = AuthComponent::user("Student.StudentSchool");

		return $school["mediator_name"] . " e " . $school["coordinator_name"];
	}

	/**
	 * Função de atalho para recuperar informações do estudante logado.
	 */
	public function getStudentInfo($field = null) {
		return AuthComponent::user("Student.Student." . $field);
	}

	public function getActorTypeInPortuguese($model, $prefix) {
		switch($model) {
			case "StudentParent":

				if($prefix == "mom_") {
					$a = "mae";
				}

				if($prefix == "dad_") {
					$a = "pai";
				}

				if($prefix == "tutor_") {
					$a = "tutor";
				}
				break;
			case "StudentPsychiatrist":
				$a = "psico";
				break;
			case "StudentSchool":

				if($prefix == "mediator_") {
					$a = "escola";
				}

				if($prefix == "coordinator_") {
					$a = "escola";
				}

				break;
		}

		return $a;
	}

}
