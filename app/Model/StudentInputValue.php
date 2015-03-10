<?php
class StudentInputValue extends AppModel {
    public $belongsTo = array("StudentInput", "StudentLesson", "Student");

    public function findGroup($student_id) {
        $return = array();
        $all = $this->find("all", array("contain" => array("StudentInput", "StudentLesson") ) );

        foreach($all as $e) {

            $date = $e["StudentInputValue"]["date"];
            $actor = $e["StudentInputValue"]["actor"];

            $return[$date][$actor][] = $e;

        } // - foreach

        return $return;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['date'])) {
            $oDateTime = DateTime::createFromFormat("d/m/Y", $this->data[$this->alias]['date']);
            $this->data[$this->alias]['date'] = $oDateTime->format("Y-m-d");
        }

        return true;
    }

    public function afterFind($results = array(), $primary = false) {
        foreach($results as $i => $result) {
            if(!empty($result[$this->alias]['date'])) {
                $oDateTime = new DateTime($result[$this->alias]['date']);
                $results[$i][$this->alias]['date'] = $oDateTime->format("d/m/Y");
            }
        }

        return $results;
    }

    public function formatToChart($chart_id) {

        $oChart = ClassRegistry::init('Admin.Chart');

        $options = array(
            'conditions' => array(
                'Chart.id' => $chart_id
            ),
            'contain' => array(
                'ChartStudentInput' => array(
                    'StudentInput' => array(
                        'Input',
                        'StudentInputValue'
                    )
                )
            )
        );
        $csi = $oChart->find("first", $options);

        // se for de pie ou donut
        if($csi['Chart']['type'] == 'pie' || $csi['Chart']['type'] == 'donut') {
            $dados = array();

            // itera cada registro de aula
            foreach($csi['ChartStudentInput'] as $tmp) {
                foreach($tmp['StudentInput']['StudentInputValue'] as $siv) {

                    var_dump($dados);

                    if(!in_array($siv['value'], $dados)) {
                        $dados[$siv['value']] = 1;
                    } else {
                        $dados[$siv['value']] = $dados[$siv['value']] + 1;
                    }
                }
            }


            $chart_config = array();

            foreach($dados as $label => $value) {
                $chart_config[] = array(
                    'value' => $value,
                    'label' => $label,
                    'color' => '#F7464A'
                );
            }

            var_dump($chart_config);
        }

        // se for de linha
        if($csi['Chart']['type'] == 'line') {
            $chart_config = array(
                'labels' => array(),
                'datasets' => array()
            );

            // itera cada registro de aula
            foreach($csi['ChartStudentInput'] as $tmp) {
                foreach($tmp['StudentInput']['StudentInputValue'] as $siv) {
                    $oDateTime = DateTime::createFromFormat("d/m/Y", $siv['date']);

                    if(!in_array($oDateTime->format("Y-m-d"), $chart_config['labels'])) {

                        $label = $oDateTime->format("Y-m-d");
                        $chart_config['labels'][] = $label;
                    }

                }
            }

            // itera cada input do gráfico
            foreach($csi['ChartStudentInput'] as $csi2) {

                $data = array();

                $options = array(
                    'conditions' => array(
                        'StudentInputValue.student_input_id' => $csi2['student_input_id'],
                        'StudentInputValue.actor' => $csi2['StudentInput']['actor'],
                    )
                );
                $tmp = $this->find("all", $options);

                foreach($chart_config['labels'] as $i => $date) {
                    $data[] = 0;
                }

                foreach($tmp as $tmp2) {
                    $oDateTime = DateTime::createFromFormat("d/m/Y", $tmp2['StudentInputValue']['date']);

                    foreach($chart_config['labels'] as $x => $date) {

                        if($date == $oDateTime->format("Y-m-d")) {
                            $data[$x] = $tmp2['StudentInputValue']['value'];
                        }
                    }
                }

                $colors = array('#F62459', '#663399', '#BF55EC', '#52B3D9', '#26A65B', '#F89406', '#95A5A6');

                shuffle($colors);

                // gera os datasets
                $dataset = array(
                    'label'                          => $csi2['StudentInput']['name'] . ' (' . $csi2['StudentInput']['actor'] . ')',
                    'fillColor'                      => "rgba(220,220,220,0.2)",
                    'strokeColor'               => $colors[0],
                    'pointColor'                 => $colors[1],
                    'pointStrokeColor'      => '#fff',
                    'pointHighlightFill'        =>'#fff',
                    'pointHighlightStroke' => 'rgba(220,220,220,1)',
                    'data'                          => $data
                );
                $chart_config['datasets'][] = $dataset;
            }
        } // FIM - if gráfico de linha

        return $chart_config;
    }
}