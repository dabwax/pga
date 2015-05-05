<?php
class DesignationAircraftModelGroupCertification extends CadastroAppModel {
    public $belongsTo = array(
        'Cadastro.DesignationAircraftModelGroup',
        'Treinamento.Certification',
    );
}