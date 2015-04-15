<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public function getActorInfo($actor, $type) {
        switch($actor) {
            case "mae":
                $model = "StudentParent";
                $prefix = "mom_";
                break;
            case "pai":
                $model = "StudentParent";
                $prefix = "dad_";
                break;
            case "tutor":
                $model = "StudentParent";
                $prefix = "tutor_";
                break;
            case "psiquiatra":
            case "psico":
                $model = "StudentPsychiatrist";
                $prefix = "";
                break;
            case "mediador":
                $model = "StudentSchool";
                $prefix = "mediator_";
                break;
            case "coordenador":
                $model = "StudentSchool";
                $prefix = "coordinator_";
                break;
        }

        if($type == "model")
            return $model;

        if($type == "prefix")
            return $prefix;
    }

	public function getActors($email) {
		// verifica se o email inserido é ator de algum aluno
		// ### INÍCIO ###

		$student = ClassRegistry::init("Student");

        // array com os possíveis atores
        $actors = array();

        // primeiro eu busco todos os pais
        $parents = $student->StudentParent->find("all", array(
            "conditions" => array(
                "OR" => array(
                    "StudentParent.mom_email" => $email,
                    "StudentParent.dad_email" => $email,
                    "StudentParent.tutor_email" => $email,
                )
            )
        ) );

        // verifico se tem algum pai como ator e adiciono
        foreach($parents as $p) {
            
            if(!empty($p["StudentParent"]["mom_email"]) && $p["StudentParent"]["mom_email"] == $email) {
                $actor = "mae";

                $actors[] = array("actor" => $actor, "id" => $p["StudentParent"]["id"], "password" => $p["StudentParent"]["mom_password"]);
            }

            if(!empty($p["StudentParent"]["dad_email"]) && $p["StudentParent"]["dad_email"] == $email) {
                $actor = "pai";

                $actors[] = array("actor" => $actor, "id" => $p["StudentParent"]["id"], "password" => $p["StudentParent"]["dad_password"]);
            }

            if(!empty($p["StudentParent"]["tutor_email"]) && $p["StudentParent"]["tutor_email"] == $email) {
                $actor = "tutor";

                $actors[] = array("actor" => $actor, "id" => $p["StudentParent"]["id"], "password" => $p["StudentParent"]["tutor_password"]);
            }
        }

        // após buscar os pais, agora vou consultar os psiquiatras
        $psychiatrists = $student->StudentPsychiatrist->find("all", array(
            "conditions" => array(
                "StudentPsychiatrist.email" => $email,
            )
        ));

        // verifico se tem algum psiquiatra como ator e adiciono
        foreach($psychiatrists as $p) {
            
            if(!empty($p["StudentPsychiatrist"]["email"])) {
                $actor = "psiquiatra";
            }

            $actors[] = array("actor" => $actor, "id" => $p["StudentPsychiatrist"]["id"], "password" => $p["StudentPsychiatrist"]["password"]);
        }

        // após buscar os psiquiatras, agora vou consultar as escolas
        $schools = $student->StudentSchool->find("all", array(
            "conditions" => array(
                "OR" => array(
                    "StudentSchool.mediator_email" => $email,
                    "StudentSchool.coordinator_email" => $email,
                )
            )
        ));

        // verifico se tem alguma escola como ator e adiciono
        foreach($schools as $p) {
            
            if(!empty($p["StudentSchool"]["mediator_email"])) {
                $actor = "mediador";

                $actors[] = array("actor" => $actor, "id" => $p["StudentSchool"]["id"], "password" => $p["StudentSchool"]["mediator_password"]);
            } else if(!empty($p["StudentSchool"]["coordinator_email"])) {
                $actor = "coordenador";

                $actors[] = array("actor" => $actor, "id" => $p["StudentSchool"]["id"], "password" => $p["StudentSchool"]["coordinator_password"]);
            }
        }

        // ### FIM ###
        
        return $actors;
	}

}