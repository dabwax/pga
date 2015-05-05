<?php
class DesignationAircraftModelGroup extends CadastroAppModel {
    public $belongsTo = array("Cadastro.DesignationAircraftModel");
    public $hasMany = array("Cadastro.DesignationAircraftModelGroupCertification");
}