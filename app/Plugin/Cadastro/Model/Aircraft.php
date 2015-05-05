<?php
class Aircraft extends CadastroAppModel {
    public $displayField = "registration";

    public $hasMany = array(
        'Cadastro.AircraftBasis',
        'Escala.ScheduleGradeAircraft'
    );
    public $hasOne = array(
        "Contract"
    );
    public $belongsTo = array(
        "Cadastro.AircraftModel"
    );

    public function getAircraftsByModel($aircraft_model_id, $find = "all") {
        $options = array(
            'conditions' => array(
                'Aircraft.aircraft_model_id' => $aircraft_model_id
            ),
            'contain' => array(
                'Contract',
                'ScheduleGradeAircraft' => array(
                    'Basis'
                )
            )
        );

        $aircrafts = $this->find("all", $options);

        if($find == "list") {
            $tmp = array();

            foreach($aircrafts  as $a) {
                $x = $a['Aircraft']['id'];
                if(!empty($a['Contract']['name'])) {
                    $tmp[$x] = $a['Aircraft']['registration'] . ' / ' . $a['Contract']['name'];
                }
            }

            return $tmp;
        }

        return $aircrafts;
    }
}