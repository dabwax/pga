<?php
App::uses('CadastroAppModel', 'Cadastro.Model');
/**
 * Role Model
 *
 * @property ClientGroupingAircraftStaff $ClientGroupingAircraftStaff
 */
class Role extends CadastroAppModel {

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ClientGroupingAircraftStaff' => array(
			'className' => 'ClientGroupingAircraftStaff',
			'foreignKey' => 'role_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
