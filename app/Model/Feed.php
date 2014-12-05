<?php
class Feed extends AppModel {
	public $belongsTo = array("Student");

	/**
	 * Callback de afterFind.
	 *
	 * Utilizado para tratar o campo `config` como array legível para o banco de dados.
	 *
	 * @return boolean true
	 */
	public function beforeSave($options = array()) {
		
	    if (!empty($this->data[$this->alias]['actor'])) {
	        $this->data[$this->alias]['actor'] = serialize($this->data[$this->alias]['actor']);
	    }
		
	    if (!empty($this->data[$this->alias]['content'])) {
	        $this->data[$this->alias]['content'] = serialize($this->data[$this->alias]['content']);
	    }

	    return true;
	}

	/**
	 * Callback de afterFind.
	 *
	 * Utilizado para tratar o campo `config` como objeto array.
	 *
	 * @return $results array
	 */
	public function afterFind($results, $primary = false) {
	    foreach ($results as $key => $val) {
	        if (isset($val[$this->alias]['actor'])) {
	            $results[$key][$this->alias]['actor'] = unserialize($results[$key][$this->alias]['actor']);
	        }

	        if (isset($val[$this->alias]['content'])) {
	            $results[$key][$this->alias]['content'] = unserialize($results[$key][$this->alias]['content']);
	        }
	    }

    	return $results;
	}

	public function generate($date, $content, $type = "input") {

		if(AuthComponent::user("Actor")) {
			$actor = AuthComponent::user("Actor");
		} else {
			$actor = "aluno";
		}
		
		$feed = array(
			"student_id" => AuthComponent::user("Student.Student.id"),
			"actor" => $actor,
			"date" => $date,
			"content" => $content,
			"sidebar" => "",
			"type" => $type
		);

		$this->create();

		$this->save($feed);

		return $this->getInsertID();
	}
}