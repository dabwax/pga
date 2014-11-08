<?php
class StudentInput extends AppModel {

	public $belongsTo = array("Student", "Input");
	public $hasMany = array("StudentInputValue");

	/**
	 * Callback de afterFind.
	 *
	 * Utilizado para tratar o campo `config` como array legível para o banco de dados.
	 *
	 * @return boolean true
	 */
	public function beforeSave($options = array()) {
		
	    if (!empty($this->data[$this->alias]['config'])) {
	        $this->data[$this->alias]['config'] = serialize($this->data[$this->alias]['config']);
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
	        if (isset($val[$this->alias]['config'])) {
	            $results[$key][$this->alias]['config'] = unserialize($results[$key][$this->alias]['config']);
	        }
	    }

    	return $results;
	}
}