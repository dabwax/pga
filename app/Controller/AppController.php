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
 * @package     app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
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
                'controller' => 'users',
                'action' => 'login',
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );

    public function beforeFilter() {
        $actors = $this->Session->read("actors");

        // se ele ainda não tiver selecionado um estudante, vai para a tela de selecionar
        if(!empty($actors) && !AuthComponent::user() && $this->params["action"] == "index") {
            return $this->redirect( array("controller" => "users", "action" => "set_student") );
        }

        // se o usuário logado for estudante e a pagina atual nao ser do plugin de estudante, redirecionar ele para home de estudante
        if(AuthComponent::user('User.role') == 'student' && $this->params["plugin"] != "student" && $this->params["action"] != "logout") {
            return $this->redirect( array("action" => "index", "controller" => "student", "plugin" => "student") );
        }

        if(!defined('IN_PRODUCTION')) {
            define('IN_PRODUCTION', ($_SERVER['HTTP_HOST'] !== 'localhost'));

            $this->set("IN_PRODUCTION", IN_PRODUCTION);
        }

        if(!empty(AuthComponent::user())) {
            $model = AuthComponent::user("Actor.model");
            $prefix = AuthComponent::user("Actor.prefix");

            if(!empty($model)) {
                $this->loadModel($model);

                $options = array(
                    'conditions' => array(
                        $model . '.id' => AuthComponent::user("Actor.id")
                    )
                );
                $ator_atualizado = $this->$model->find("first", $options);

                $ator_atualizado = $ator_atualizado[$model];
                $ator_atualizado['model'] = $model;
                $ator_atualizado['prefix'] = $prefix;

                $this->set(compact("ator_atualizado"));
            }
        }

        $this->Auth->allow('display', 'set_student', 'sair', 'export');
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
