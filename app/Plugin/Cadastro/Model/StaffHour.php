<?php
class StaffHour extends CadastroAppModel {
	public $belongsTo = array("Cadastro.Staff", "Cadastro.AircraftModel");

	public function findFlightsByStaffId($id) {
		$options = array(
			"conditions" => array(
				"StaffHour.staff_id" => $id
			)
		);
		$flight = $this->find("all", $options);

		return $flight;
	}
}