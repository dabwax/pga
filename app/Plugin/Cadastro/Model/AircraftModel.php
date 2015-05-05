<?php
class AircraftModel extends CadastroAppModel {
    public $hasMany = array(
        "Cadastro.Aircraft",
        "Cadastro.AircraftSimilar",
        "Cadastro.StaffFlight",
        "Cadastro.StaffDesignation",
        "Escala.Schedule",
    );
    public $displayField = "model";
}