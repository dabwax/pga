<?php
class DesignationAircraftModel extends CadastroAppModel {
    public $belongsTo = array("Cadastro.Designation", "Cadastro.AircraftModel");
    public $hasMany = array("Cadastro.DesignationAircraftModelGroup");
}