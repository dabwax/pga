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
                        $sub_label = $config_i['name'];

                        $sub_labels[$i] = $sub_label;

                        $data[$label][$sub_label] = 0;
                    }

                    // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
                    foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                        $data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                    }

                }

                foreach($data as $label => $sub_labels) {
                    foreach($sub_labels as $sub_label => $y) {

                        if($y > 0) {
                            $dataPoints[] = array(
                                'y' => $y,
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
            foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
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
