<?php
class AircraftSimilar extends CadastroAppModel {
	public $belongsTo = array(
		"Cadastro.AircraftModel",
		"AircraftModelSimilar" => array(
			"className" => "Cadastro.AircraftModel",
			"foreignKey" => "aircraft_model_related_id"
		),
	);
}