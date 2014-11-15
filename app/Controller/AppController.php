<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
            	'plugin' => false,
                'controller' => 'pages',
                'action' => 'index',
            ),
            'logoutRedirect' => array(
            	'plugin' => false,
                'controller' => 'pages',
                'action' => 'index',
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('display', 'set_student');
    }


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
	 * Recupera qual o tipo de ator do usuário atual.
	 */
	public function getActor($user = null) {

		switch($user["model"]) {
			case "StudentParent":

				if($user["prefix"] == "dad_" || $user["prefix"] == "mom_") {
					$actor = "pais";
				} else if($user["prefix"] == "tutor_") {
					$actor = "tutor";
				}

				break;
			case "StudentPsychiatrist":
				$actor = "psico";
				break;
			case "StudentSchool";
				$actor = "escola";
				break;
		}

		return $actor;
	}
	
}
