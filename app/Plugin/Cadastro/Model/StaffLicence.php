<?php

class StaffLicence extends CadastroAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'aircraft_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'canac' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'license' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'exp' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AircraftModel' => array(
			'className' => 'Cadastro.AircraftModel',
			'foreignKey' => 'aircraft_model_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function findLicencesByStaffId($id) {
		return $this->find("all", array(
			"order" => array(
				"StaffLicence.expiration ASC"
			),
			"conditions" => array(
				"StaffLicence.staff_id" => $id
			),
			"contain" => array(
				"AircraftModel"
			)
		) );
	}

	public function beforeSave($options = array()) {

		if(!empty($this->data["StaffLicence"]["expiration"])) {
			$this->data["StaffLicence"]["expiration"] = $this->parseDate($this->data["StaffLicence"]["expiration"], 'Y-m-d');
		}
		if(!empty($this->data["StaffLicence"]["exp"])) {
			$this->data["StaffLicence"]["exp"] = $this->parseDate($this->data["StaffLicence"]["exp"], 'Y-m-d');
		}
		return true;
	}

	public function afterFind($results, $primary = false) {

		foreach ($results as $key => $val) {
	        if (isset($val['StaffLicence']['expiration'])) {
	            $results[$key]['StaffLicence']['expiration'] = $this->parseDate($val['StaffLicence']['expiration']);
	        }
	        if (isset($val['StaffLicence']['exp'])) {
	            $results[$key]['StaffLicence']['exp'] = $this->parseDate($val['StaffLicence']['exp']);
	        }
	    }

    	return $results;
	}
}
