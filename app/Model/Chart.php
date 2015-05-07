<?php

class Chart extends AppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Student' => array(
            'className' => 'Student',
            'foreignKey' => 'student_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Input'
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'ChartStudentInput'
    );

    public function datapointLine($c) {

        $dataPoints = array();

        $data = array();

        // itera cada um dos campos incluídos no gráfico
        foreach($c['ChartStudentInput'] as $csi) {
            // nome do campo
            $label = $csi['StudentInput']['name'];

            // inclui o campo no array de data
            $data[$label] = array();
            
            // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
            foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                if($c['Chart']['display_mode'] == "mes_a_mes") {
                    $x = DateTime::createFromFormat("d/m/Y", $siv['date']);

                    $ano = $x->format("Y");

                    if(!empty($data[$label][$x->format('m')])) {
                        $data[$label][$x->format('m')] = array('value' => $data[$label][$x->format('m')]['value'] + $siv['value'], 'date' => $x->format("01/m/Y"));
                    } else {
                        $data[$label][$x->format('m')] = array('value' => $siv['value'],'date' => $siv['date']);
                    }
                } else {
                    @$data[$label][] = array('value' => $siv['value'], 'date' => $siv['date']);

                    $dia = "01";
                }
            }
        }


        if($c['Chart']['display_mode'] == "mes_a_mes") {
            foreach($c['ChartStudentInput'] as $csi) {
                // nome do campo
                $label = $csi['StudentInput']['name'];

                $meses = 12;

                for($i =1; $i <= $meses; $i++) {
                    $i = str_pad($i, 2, '0', STR_PAD_LEFT);

                    if(empty($data[$label][$i])) {

                        if(empty($ano)) {
                            $ano = date("Y");
                        }
                        
                        $data[$label][$i] = array('value' => 0, 'date' => "01/" . $i . "/" . $ano);
                    }
                }
                ksort($data[$label]);
            }
        }

        foreach($data as $label => $dados) {
            foreach($dados as $y => $total) {
                $x = DateTime::createFromFormat("d/m/Y", $total['date']);
                $ano = $x->format('Y');
                $mes = $x->format("m");
                $dia = $x->format("d");

                $x = array($ano, $mes, $dia);

                $dataPoints[] = array('y' => $total['value'], 'label' => $label . ': ' . $y, 'x' => $x);
            }
        }

        return array('dataPoints' => $dataPoints);
    }

    public function datapointPie($c) {
                // prepara array de data
                $data = array();

                // itera cada um dos campos incluídos no gráfico
                foreach($c['ChartStudentInput'] as $csi) {
                    // nome do campo
                    $label = $csi['StudentInput']['name'];

                    // inclui o campo no array de data
                    $data[$label] = array();

                    // itera as configurações do campo, para adicionar as opções da escala (muito, pouco, extravagante, etc) no $data
                    foreach($csi['StudentInput']['config'] as $i => $config_i) {
                        if(is_array($config_i)) {
                            $sub_label = $config_i['name'];
                        } else {
                            $sub_label = $config_i;
                        }

                        $sub_labels[$i] = $sub_label;

                        $data[$label][$sub_label] = 1;
                    }

                    // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
                    foreach($csi['StudentInput']['StudentInputValue'] as $siv) {

                        if(!empty($data[$label][$siv['value']])) {
                            $data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                        } else {
                            $data[$label][$siv['value']] = 1;
                        }
                    }

                }

                foreach($data as $label => $sub_labels) {
                    foreach($sub_labels as $sub_label => $y) {

                        if($y > 0) {
                            $dataPoints[] = array(
                                'y' => $y + 1,
                                'legendText' => $sub_label,
                                'indexLabel' => $label . ': ' .$sub_label . ' (' . $y . ')',
                            );
                        } else if($y == 0) {

                            $dataPoints[] = array(
                                'y' => 1,
                                'legendText' => $sub_label,
                                'indexLabel' => $sub_label . ' (' . $y . ')',
                            );
                        }
                    }
                }

                return array('data' => $data, 'dataPoints' => $dataPoints);
    }

    public function datapointBar($c) {
        $dataPoints = array();

        $data = array();

        // itera cada um dos campos incluídos no gráfico
        foreach($c['ChartStudentInput'] as $csi) {
            // nome do campo
            $label = $csi['StudentInput']['name'];

            // inclui o campo no array de data
            $data[$label] = array();
            
            // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
            if(!empty($csi['StudentInput']['StudentInputValue'])) {
                foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                    @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                }
            } else {
                $data[$label][0] = 0;
            }
        }


        foreach($data as $label => $dados) {
            foreach($dados as $y => $total) {
                $dataPoints[] = array('y' => $y, 'label' => $label . ': ' . $y);
            }
        }

        return array('dataPoints' => $dataPoints);
    }

    public function datapointColumn($c) {
        $dataPoints = array();

        $data = array();

        // itera cada um dos campos incluídos no gráfico
        foreach($c['ChartStudentInput'] as $csi) {
            // nome do campo
            $label = $csi['StudentInput']['name'];

            // inclui o campo no array de data
            $data[$label] = array();
            
            // se não for do tipo escala texto
            if($csi['StudentInput']['Input']['id'] != 5) {
                // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
                foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                    @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                }
            // se for do tipo escala texto
            } else {
                 // itera as configurações do campo, para adicionar as opções da escala (muito, pouco, extravagante, etc) no $data
                    foreach($csi['StudentInput']['config'] as $i => $config_i) {
                        $sub_label = $config_i['name'];

                        $sub_labels[$i] = $sub_label;

                        $data[$label][$sub_label] = 1;
                    }

                    // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
                    foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                        if(!empty($data[$label][$siv['value']])) {
                            $data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                        } else {
                            $data[$label][$siv['value']] = 1;
                        }
                    }
            }
        }

        foreach($data as $label => $dados) {
            foreach($dados as $y => $total) {
                $dataPoints[] = array('y' => $total, 'label' => $label . ': ' . $y);
            }
        }

        return array('dataPoints' => $dataPoints);
    }
}
