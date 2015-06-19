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

    public function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }

    public function getMateriasPorDia($student_id) {
           $options = [
            'conditions' => [
                    'StudentInputValue.student_id' => $student_id,
                    'StudentInputValue.student_lesson_id IS NOT NULL',
            ],
            'contain' => false
        ];

        $oStudentInputValue = ClassRegistry::init("StudentInputValue");
        $find = $oStudentInputValue->find("all", $options);
        $dias = array();

        foreach($find as $f) {
            $student_lesson_id = $f['StudentInputValue']['student_lesson_id'];
            $date = $f['StudentInputValue']['date'];

            if(empty($dias[$date])) {
                $dias[$date] = [];

                $dias[$date][$student_lesson_id] = 1;
            } else {

                $dias[$date][$student_lesson_id] = 1;
            }

        }

        return $dias;
    }


    public function datapointLine($c, $materias) {

        $dataPoints = array();

        $data = array();
        $datas = array();

        // itera cada um dos campos incluídos no gráfico
        foreach($c['ChartStudentInput'] as $csi) {
            // nome do campo
            $label = $csi['StudentInput']['name'];

            // inclui o campo no array de data
            $data[$label] = array();
            
            $aulas_dessa_materias = $this->getMateriasPorDia( $c['Chart']['student_id'] );

            // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
            foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                if($c['Chart']['display_mode'] == "mes_a_mes") {
                    $x = DateTime::createFromFormat("d/m/Y", $siv['date']);

                    $ano = $x->format("Y");

                    if( !empty( $c['Chart']['student_lesson_id'] ) ) {

                        $data_dessa_aula = $siv['date'];

                        if(array_key_exists($data_dessa_aula, $aulas_dessa_materias)) {

                            if(array_key_exists($c['Chart']['student_lesson_id'], $aulas_dessa_materias[$data_dessa_aula])) {

                                if($c['Chart']['display_mode'] == "mes_a_mes") {
                                    $data[$label][$x->format('m')][] = array('value' => $siv['value'], 'date' => $x->format("01/m/Y"));
                                } else {
                                    $data[$label][$x->format('m')][] = array('value' => $siv['value'], 'date' => $x->format("d/m/Y"));
                                }

                            }
                        }

                            
                    } else {
                        if($c['Chart']['display_mode'] == "mes_a_mes") {
                            $data[$label][$x->format('m')][] = array('value' => $siv['value'], 'date' => $x->format("01/m/Y"));
                        } else {
                            $data[$label][$x->format('m')][] = array('value' => $siv['value'], 'date' => $x->format("d/m/Y"));
                        }
                    }
                } else {
                    @$data[$label][] = array('value' => $siv['value'], 'date' => $siv['date']);

                    $dia = "01";
                }
            }
        }

            $meses_anos = array();

            foreach($data as $label => $dadoss) {
                foreach($dadoss as $dados) {

                    if(empty($dados['date'])) {
                        foreach($dados as $dado) {
                            $datetime = DateTime::createFromFormat("d/m/Y", $dado['date']);

                            $ano = $datetime->format("Y");
                            $mes = $datetime->format("n");

                            $meses_anos[$label][$ano][$mes][] = $dado['value'];
                        }
                    } else {

                            $datetime = DateTime::createFromFormat("d/m/Y", $dados['date']);

                            $ano = $datetime->format("Y");
                            $mes = $datetime->format("n");
                            $dia = $datetime->format("d");

                            if(!in_array($dados['date'], $datas)) {
                                $datas[] = $dados['date'];
                            }


                             if($c['Chart']['display_mode'] == "mes_a_mes") {
                                $meses_anos[$label][$ano][$mes][] = $dados['value'];
                            } else {
                                $meses_anos[$label][$ano][$mes][] = array('value' => $dados['value'], 'dia' => $dia);
                            }
                    }
                }
            }

            foreach($meses_anos as $label => $anos) {
                ksort($meses_anos[$label]);

                foreach($meses_anos[$label] as $ano => $dados) {
                    ksort($meses_anos[$label][$ano]);
                }
            }

            unset($data);

            foreach($meses_anos as $label => $anos) {
                $data[$label] = array();

                foreach($anos as $ano => $meses) {

                    foreach($meses as $mes => $values) {

                        if($c['Chart']['display_mode'] == "mes_a_mes") {

                            $total = count($values);
                            $total2 = 0;
                            $dia = "01";

                            foreach($values as $v) {
                                    $total2 = $total2 + $v;
                            }

                            $media = round($total2 / $total, 1);

                            $mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
                            $data[$label][] = array('date' => $dia . '/' . $mes . '/' . $ano, 'value' => $media);

                            // dia a dia
                        } else {
                                $total = count($values);
                                $total2 = 0;

                                foreach($values as $v) {
                                        $total2 = $total2 + $v['value'];
                                        $dia = $v['dia'];
                                    $mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
                                    $data[$label][] = array('date' => $dia . '/' . $mes . '/' . $ano, 'value' => $v['value']);

                                }


                        }

                        // TODO SE FOR DIA A DIA USAR O DIA ATUAL SE FOR MES A MES SEMPRE DIA PRIMEIRO
                    }
                } 
                
            }

            //var_dump($data);

        if(!empty($data)) {
        foreach($data as $label => $dados) {
            foreach($dados as $y => $total) {
                $x = DateTime::createFromFormat("d/m/Y", $total['date']);
                $ano = $x->format('Y');
                $mes = $x->format("m");
                $dia = $x->format("d");

                $x = array($ano, $mes, $dia);

                $student_lesson_id = $c['Chart']['student_lesson_id'];

                $dataPoints[$label][] = array('y' => $total['value'], 'label' => $label, 'x' => $x);

            }
        }
        
        }

        return array('dataPoints' => $dataPoints);
    }

    public function datapointPie($c, $materias) {
                // prepara array de data
                $data = array();
                $labels_escala_texto = array();

                // itera cada um dos campos incluídos no gráfico
                foreach($c['ChartStudentInput'] as $csi) {
                    // nome do campo
                    $label = $csi['StudentInput']['name'];

                    // inclui o campo no array de data
                    $data[$label] = array();

                    // itera as configurações do campo, para adicionar as opções da escala (muito, pouco, extravagante, etc) no $data

                    if(!empty($csi['StudentInput']['config'])) {
                        if(is_array($csi['StudentInput']['config'])) {
                            foreach($csi['StudentInput']['config'] as $i => $config_i) {
                                if(is_array($config_i)) {
                                    $sub_label = $config_i['name'];
                                } else {
                                    $sub_label = $config_i;
                                }

                                $sub_labels[$i] = $sub_label;

                                $data[$label][$sub_label] = 0;
                            }
                        }
                    }

                    $input_id = $csi['StudentInput']['Input']['id'];

                    if($input_id == 5 || $input_id == 3 || $input_id == 1) {

                        if(!empty($csi['StudentInput']['StudentInputValue'])) {
                            foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                                $novo_label = strip_tags($siv['value']);

                                if($csi['StudentInput']['Input']['id'] == 1) {
                                    $dateTime = DateTime::createFromFormat("d/m/Y", $siv['value']);

                                    $novo_label = $dateTime->format("m/Y");
                                }

                                if(!in_array($novo_label, $labels_escala_texto)) {
                                    $labels_escala_texto[] = $novo_label;
                                }
                            }
                        }
                        
                    }


                    $aulas_desse_estudante = $this->getMateriasPorDia( $c['Chart']['student_id'] );

                    // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
                    foreach($csi['StudentInput']['StudentInputValue'] as $siv) {

                        if(!empty($c['Chart']['student_lesson_id'])) {

                            $date = $siv['date'];
                            $student_lesson_id = $c['Chart']['student_lesson_id'];

                            if(array_key_exists($date, $aulas_desse_estudante)) {
                                if(array_key_exists($student_lesson_id, $aulas_desse_estudante[$date])) {
                                    @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                                }
                            }
                        } else {

                            @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                        }

                    }

                }

                foreach($data as $label => $sub_labels) {
                    foreach($sub_labels as $sub_label => $y) {

                        if($y > 0) {
                            $dataPoints[] = array(
                                'y' => $y,
                                'legendText' => $sub_label,
                                'indexLabel' => $label,
                            );
                        } else if($y == 0) {

                            $dataPoints[] = array(
                                'y' => 0,
                                'legendText' => $sub_label,
                                'indexLabel' => $sub_label,
                            );
                        }
                    }
                }

                $tmp = array();

                if(!empty($labels_escala_texto)) {
                    foreach($labels_escala_texto as $l_escala_texto) {

                        $ja_foi_incluido = false;

                        foreach($tmp as $t) {
                            if($t['label'] == $l_escala_texto) {
                                $ja_foi_incluido = true;
                            }
                        }

                        if(!$ja_foi_incluido) {
                            $tmp[] = array('y' => 0, 'label' => $l_escala_texto);
                        }
                    }
                }

                $tmp = $this->array_orderby($tmp, 'label', SORT_ASC);

                if(empty($dataPoints)) {
                    return false;
                }
                foreach($dataPoints as $x => $dataPoint) {

                    if($input_id == 5 || $input_id == 3 || $input_id == 1) {
                    
                        $dataPoint['indexLabel'] = $dataPoint['legendText'] . ' (#percent%)';
                    } else {
                        $dataPoint['y'] = $dataPoint['legendText'];
                    }
                    $tmp[$x] = $dataPoint;
                }
                
                $dataPoints = $tmp;

                if($c['Chart']['type'] == "pie") {
                    $type = "pie";
                } else {
                    $type = "doughnut";
                }
                
                $data = array(
                    'type' => $type,
                    'dataPoints' => $dataPoints
                );

                $data = array($data);

                return array('data' => $data);
    }

    public function datapointBar($c, $materias) {
        $dataPoints = array();
        $labels = array();
        $labels_escala_texto = array();
        $labels_registro_textual = array();
        $input_id = 0;

        $data = array();

        // itera cada um dos campos incluídos no gráfico
        foreach($c['ChartStudentInput'] as $csi) {
            // nome do campo
            $label = $csi['StudentInput']['name'];

            // inclui o campo no array de data
            $data[$label] = array();

            if(!in_array($label, $labels)) {
                $labels[] = strip_tags($label);
            }

            $input_id = $csi['StudentInput']['Input']['id'];

            if($csi['StudentInput']['Input']['id'] == 5 || $csi['StudentInput']['Input']['id'] == 3 || $csi['StudentInput']['Input']['id'] == 1) {

                if(!empty($csi['StudentInput']['StudentInputValue'])) {
                    foreach($csi['StudentInput']['StudentInputValue'] as $siv) {

                        $novo_label = strip_tags($siv['value']);

                        if($csi['StudentInput']['Input']['id'] == 1) {
                            $dateTime = DateTime::createFromFormat("d/m/Y", $siv['value']);

                            $novo_label = $dateTime->format("m/Y");
                        }

                        if(!in_array($novo_label, $labels_escala_texto)) {
                            $labels_escala_texto[] = $novo_label;
                        }
                    }
                }
                
            }
            
            // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
            if(!empty($csi['StudentInput']['StudentInputValue'])) {
                foreach($csi['StudentInput']['StudentInputValue'] as $siv) {

                    if(in_array($siv['date'], $materias)) {
                        $materias_do_dia = $materias[$siv['date']];
                        $student_lesson_id = $c['Chart']['student_lesson_id'];
                        
                        if(!empty($student_lesson_id)) {
                            if(in_array($student_lesson_id, $materias_do_dia)) {

                                @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                            }
                        } else {
                        @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                        }
                    } else {
                        
                        @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                    }

                }
            } else {
                $data[$label][0] = 0;
            }
        } 

        $linhas = array();

        foreach($data as $label => $numeros) {

            foreach($numeros as $x => $num) {
                $tmp = array();

                foreach($labels as $novo_label) {

                    if($novo_label == $label) {

                        if(is_numeric($x)) {
                            $y = $x;
                        } else {
                            $novo_label = $x;
                            $y = $num;

                            if($input_id == 1) {
                                $dateTime = DateTime::createFromFormat("d/m/Y", $x);

                                $novo_label = $dateTime->format("m/Y");
                            }
                        }
                    } else {
                        $y = 0;
                    }

                    $tmp[] = array('y' => $y, 'label' => strip_tags($novo_label));
                }

                if(!empty($labels_escala_texto)) {
                    foreach($labels_escala_texto as $l_escala_texto) {

                        $ja_foi_incluido = false;

                        foreach($tmp as $t) {
                            if($t['label'] == $l_escala_texto) {
                                $ja_foi_incluido = true;
                            }
                        }

                        if(!$ja_foi_incluido) {
                            $tmp[] = array('y' => 0, 'label' => $l_escala_texto);
                        }
                    }
                }

                $tmp = $this->array_orderby($tmp, 'label', SORT_ASC);

                $linhas[] = array(
                    'type' => 'stackedBar',
                    'dataPoints' => $tmp
                );
            }

        }

        if($input_id == 1) {
            $total_por_mes = array();

            foreach($linhas as $linha) {
                foreach($linha['dataPoints'] as $datapoint) {
                    @$total_por_mes[$datapoint['label']] = @$total_por_mes[$datapoint['label']] + $datapoint['y'];
                }
            }

            $novo_datapoint = array();
            foreach($total_por_mes as $mes => $num) {
                $novo_datapoint[] = array(
                    'label' => $mes,
                    'y' => $num
                );
            }

            $data = array(
                'type' => 'stackedBar',
                'dataPoints' => $novo_datapoint
            );

            $data = array($data);
        } else {
            $data = $linhas;
        }

        return array('data' => $data);
    }

    private function array_orderby() {
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

    public function datapointColumn($c, $materias) {
        $dataPoints = array();
        $labels = array();
        $labels_escala_texto = array();
        $labels_registro_textual = array();
        $input_id = 0;

        $data = array();

        // itera cada um dos campos incluídos no gráfico
        foreach($c['ChartStudentInput'] as $csi) {
            // nome do campo
            $label = $csi['StudentInput']['name'];

            // inclui o campo no array de data
            $data[$label] = array();

            if(!in_array($label, $labels)) {
                $labels[] = strip_tags($label);
            }

            $input_id = $csi['StudentInput']['Input']['id'];

            if($csi['StudentInput']['Input']['id'] == 5 || $csi['StudentInput']['Input']['id'] == 3 || $csi['StudentInput']['Input']['id'] == 1) {

                if(!empty($csi['StudentInput']['StudentInputValue'])) {
                    foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                        $novo_label = strip_tags($siv['value']);

                        if($csi['StudentInput']['Input']['id'] == 1) {
                            $dateTime = DateTime::createFromFormat("d/m/Y", $siv['value']);

                            $novo_label = $dateTime->format("m/Y");
                        }

                        if(!in_array($novo_label, $labels_escala_texto)) {
                            $labels_escala_texto[] = $novo_label;
                        }
                    }
                }
                
            }
            
            // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
            // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
            if(!empty($csi['StudentInput']['StudentInputValue'])) {
                foreach($csi['StudentInput']['StudentInputValue'] as $siv) {

                        $student_lesson_id = $c['Chart']['student_lesson_id'];
                    if(in_array($siv['date'], $materias) && !empty($student_lesson_id)) {
                        $materias_do_dia = $materias[$siv['date']];
                        
                        if(!empty($student_lesson_id)) {
                            if(in_array($student_lesson_id, $materias_do_dia)) {

                                @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                            }
                        } else {
                        @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                        }
                    } else {

                        @$data[$label][$siv['value']] = $data[$label][$siv['value']] + 1;
                    }

                }
            } else {
                $data[$label][0] = 0;
            }
        } 

        $linhas = array();

        foreach($data as $label => $numeros) {

            foreach($numeros as $x => $num) {
                $tmp = array();

                foreach($labels as $novo_label) {

                    if($novo_label == $label) {

                        if(is_numeric($x)) {
                            $y = $x;
                        } else {
                            $novo_label = $x;
                            $y = $num;

                            if($input_id == 1) {
                                $dateTime = DateTime::createFromFormat("d/m/Y", $x);

                                $novo_label = $dateTime->format("m/Y");
                            }
                        }
                    } else {
                        $y = 0;
                    }

                    $tmp[] = array('y' => $y, 'label' => strip_tags($novo_label));
                }

                if(!empty($labels_escala_texto)) {
                    foreach($labels_escala_texto as $l_escala_texto) {

                        $ja_foi_incluido = false;

                        foreach($tmp as $t) {
                            if($t['label'] == $l_escala_texto) {
                                $ja_foi_incluido = true;
                            }
                        }

                        if(!$ja_foi_incluido) {
                            $tmp[] = array('y' => 0, 'label' => $l_escala_texto);
                        }
                    }
                }

                $tmp = $this->array_orderby($tmp, 'label', SORT_ASC);

                $linhas[] = array(
                    'type' => 'stackedColumn',
                    'dataPoints' => $tmp
                );
            }

        }

        if($input_id == 1) {
            $total_por_mes = array();

            foreach($linhas as $linha) {
                foreach($linha['dataPoints'] as $datapoint) {
                    @$total_por_mes[$datapoint['label']] = @$total_por_mes[$datapoint['label']] + $datapoint['y'];
                }
            }

            $novo_datapoint = array();
            foreach($total_por_mes as $mes => $num) {
                $novo_datapoint[] = array(
                    'label' => $mes,
                    'y' => $num
                );
            }

            $data = array(
                'type' => 'stackedColumn',
                'dataPoints' => $novo_datapoint
            );

            $data = array($data);
        } else {
            $data = $linhas;
        }
        return array('data' => $data);
    }

    public function datapointNumAbsoluto($c, $materias) {
        $dataPoints = array();

        $data = array();


        // itera cada um dos campos incluídos no gráfico
        foreach($c['ChartStudentInput'] as $csi) {
            // nome do campo
            $label = $csi['StudentInput']['name'];

            // inclui o campo no array de data
            $data[$label] = array();
            

            // se não for do tipo escala texto
            if($csi['StudentInput']['Input']['id'] == 6) {


                if(empty($csi['StudentInput']['StudentInputValue'])) {
                    $data[$label] = 0;
                } else {
                    $data[$label] = array('total' => 0, 'total_dias' => 0);
                    $datas_corridas = array();

                    // agora, itera os registros deste input e inclui ele no seu devido grupo no $data
                    foreach($csi['StudentInput']['StudentInputValue'] as $siv) {
                        $data[$label]['total'] = $data[$label]['total'] + $siv['value'];

                        if(!in_array($siv['date'], $datas_corridas)) {
                            $data[$label]['total_dias'] = $data[$label]['total_dias'] + 1;
                            $datas_corridas[] = $siv['date'];
                        }
                    }
                }

            }

        }

        foreach($data as $label => $dados) {
                $dataPoints[] = array('total' => $dados['total'], 'total_dias' => $dados['total_dias'], 'label' => $label);
        }

        return array('dataPoints' => $dataPoints);
    }
}
