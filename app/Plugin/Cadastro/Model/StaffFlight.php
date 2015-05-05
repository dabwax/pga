<?php

class StaffFlight extends CadastroAppModel {
	public $belongsTo = array("Cadastro.AircraftModel");
	public $fb = array(
		"1P",
		"IN",
		"2P",
		"DC",
		"CM"
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'model' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fb' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ifr' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'noturno' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'h_nav' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'app' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'daytime' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nighttime' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'observations' => array(
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

	public function getFb() {
		return $this->fb;
	}

	public function findFlightsByStaffId($id) {
		$_voos = $this->find("all", array(
			"conditions" => array(
				"StaffFlight.staff_id" => $id
			),
			"contain" => array(
				"AircraftModel" => array(
					"fields" => array(
						"AircraftModel.model"
					) 
				)
			)
		) );

		$voos = array();

		foreach($_voos as $_v) {
			$voos[$_v["AircraftModel"]["model"]][] = $_v;
		}

		foreach($voos as $model => $flights) {
			foreach($flights as $k => $f) {
				// calcula o total
				$voos[$model][$f["StaffFlight"]["fb"]]["total"] = @$voos[$model][$f["StaffFlight"]["fb"]]["total"] + $f["StaffFlight"]["total"];
				$voos[$model][$f["StaffFlight"]["fb"]]["ifr"] = @$voos[$model][$f["StaffFlight"]["fb"]]["ifr"] + $f["StaffFlight"]["ifr"];
				$voos[$model][$f["StaffFlight"]["fb"]]["noturno"] = @$voos[$model][$f["StaffFlight"]["fb"]]["noturno"] + $f["StaffFlight"]["noturno"];
				$voos[$model][$f["StaffFlight"]["fb"]]["h_nav"] = @$voos[$model][$f["StaffFlight"]["fb"]]["h_nav"] + $f["StaffFlight"]["h_nav"];
				$voos[$model][$f["StaffFlight"]["fb"]]["app"] = @$voos[$model][$f["StaffFlight"]["fb"]]["app"] + $f["StaffFlight"]["app"];
				$voos[$model][$f["StaffFlight"]["fb"]]["daytime"] = @$voos[$model][$f["StaffFlight"]["fb"]]["daytime"] + $f["StaffFlight"]["daytime"];
				$voos[$model][$f["StaffFlight"]["fb"]]["nighttime"] = @$voos[$model][$f["StaffFlight"]["fb"]]["nighttime"] + $f["StaffFlight"]["nighttime"];

				// limpa esse voo
				unset($voos[$model][$k]);
			}
		}

		return $voos;
	}
}
