<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('CakeEmail', 'Network/Email');

class Student extends AppModel {

    public $hasOne = array(
        'StudentParent',
        'StudentPsychiatrist',
        'StudentSchool'
    );

    public $hasMany = array(
        'Feed',
        'StudentExercise',
        'StudentLesson',
        'StudentInput',
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();

            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }

        if (isset($this->data[$this->alias]['date_of_birth'])) {
            $oDateTime = DateTime::createFromFormat("d/m/Y", $this->data[$this->alias]['date_of_birth']);
            $this->data[$this->alias]['date_of_birth'] = $oDateTime->format("Y-m-d");
        }

        return true;
    }

    public function afterFind($results = array(), $primary = false) {
        foreach($results as $i => $result) {
            if(!empty($result['Student']['date_of_birth'])) {
                $oDateTime = new DateTime($result['Student']['date_of_birth']);
                $results[$i]['Student']['date_of_birth'] = $oDateTime->format("d/m/Y");
            }
        }

        return $results;
    }

    public function sendWelcomeEmail($nome, $ator, $aluno, $destinatario) {
        $Email = new CakeEmail('smtp');

        $Email->viewVars(array('nome' => $nome, 'ator' => $ator, 'aluno' => $aluno));

        $Email->template('bem_vindo')
            ->emailFormat('html')
            ->to($destinatario)
            ->from('contato@pga.com.br')
            ->subject("[PGA] Seja bem-vindo, " . $nome)
            ->send();
    }

}
