<?php
/**
 * Páginas envolvendo evolução encontram-se aqui.
 */
class EvolutionController extends AppController {
    public $uses = array("Chart", "Student");

    public function export($student_id, $date_start, $date_finish) {
        $this->layout = "iframe";
        $this->set("title_for_layout", "Relatório da Evolução");

        $tmp = explode("_", $date_start);
        $date_start  = new DateTime($tmp[0] . '-' . $tmp[1] . '-' . $tmp[2]);
        $tmp = explode("_", $date_finish);
        $date_finish  = new DateTime($tmp[0] . '-' . $tmp[1] . '-' . $tmp[2]);

        $conditions = array(
            "StudentInputValue.student_id" => $student_id
        );

            if($this->request->is("post")) {

                $tmp = explode("/", $this->request->data['Evolution']['date_start']);
                $date_start = $tmp[2] . "_" . $tmp[1] . "_" . $tmp[0];
                $tmp = explode("/", $this->request->data['Evolution']['date_finish']);
                $date_finish = $tmp[2] . "_" . $tmp[1] . "_" . $tmp[0];

                return $this->redirect( array('action' => 'export', $student_id, $date_start, $date_finish) );
            }

            $conditions['StudentInputValue.date BETWEEN ? AND ?'] = array($date_start->format("Y-m-d"), $date_finish->format("Y-m-d"));
            $tem_busca = false;


        $this->set(compact("date_start", "date_finish"));

        $options = array(
            'conditions' => array(
                'Chart.student_id'  => $student_id
            ),
            'contain' => array(
                'ChartStudentInput' => array(
                    'StudentInput' => array(
                        'StudentInputValue' => array(
                            'conditions' => $conditions
                        ),
                        'Input'
                    )
                )
            ),
            'order' => array(
                'Chart.order DESC'
            )
        );
        $charts = $this->Chart->find("all", $options);

        $this->loadModel("StudentInputValue");

        $options = array(
            'conditions' => array(
                'StudentInputValue.student_id' => $student_id,
            )
        );
        $sivs_por_materia = $this->StudentInputValue->find("all", $options);

        $sivs_por_materia2 = array();

        foreach($sivs_por_materia as $siv) {
            $date = $siv['StudentInputValue']['date'];

            if(!empty($siv['StudentInputValue']['student_lesson_id'])) {
                $sivs_por_materia2[$date][] = $siv['StudentInputValue']['student_lesson_id'];
            }
        }
        
        // itera os gráficos existentes
        foreach($charts as $x => $c) {

            // configura os dataPoints

            // SE FOR PIZZA, DATAPOINT DE PIZZA
            if($c['Chart']['type'] == 'pie') {
                $tmp = $this->Chart->datapointPie($c, $sivs_por_materia2);

                $is_bar = true;

                $dataPoints = $tmp['data'];
            }

            // SE FOR DONUT, DATAPOINT DE DONUT
            if($c['Chart']['type'] == 'doughnut') {
                $tmp = $this->Chart->datapointPie($c, $sivs_por_materia2);

                $is_bar = true;
                
                $dataPoints = $tmp['data'];
            }

            // SE FOR LINHA, DATAPOINT DE LINHA
            if($c['Chart']['type'] == 'line') {
                $tmp = $this->Chart->datapointLine($c, $sivs_por_materia2);

                $dataPoints = $tmp['dataPoints'];
            }
            
            // SE FOR BARRA, DATAPOINT DE BARRA
            if($c['Chart']['type'] == 'bar') {
                $tmp = $this->Chart->datapointBar($c, $sivs_por_materia2);

                $is_bar = true;

                $dataPoints = $tmp['data'];
            }

            // SE FOR COLUNA, DATAPOINT DE COLUNA
            if($c['Chart']['type'] == 'column') {
                $tmp = $this->Chart->datapointColumn($c, $sivs_por_materia2);

                $is_bar = true;
                
                $dataPoints = $tmp['data'];
            }

            // SE FOR NÚMERO ABSOLUTO, DATAPOINT DE NÚMERO ABSOLUTO
            if($c['Chart']['type'] == 'num_absoluto') {
                $tmp = $this->Chart->datapointNumAbsoluto($c, $sivs_por_materia2);

                $dataPoints = $tmp['dataPoints'];

                if($c['Chart']['sub_type'] == "nota") {

                            // Buscar todas as matérias do estudante
                            $options = array(
                                'conditions' => array(
                                    'StudentLesson.student_id' => $student_id
                                )
                            );

                            $materias = array();
                            $student_lessons = $this->Student->StudentLesson->find("all", $options);

                            foreach($student_lessons as $sl) {
                                $materia_nome = $sl['StudentLesson']['name'];

                                if(!in_array($materia_nome, $materias)) {
                                    $materias[$materia_nome] = array(
                                        'nome' => $sl['StudentLesson']['name'],
                                        'notas' => array()
                                    );

                                    $options = array(
                                        'conditions' => array(
                                            'StudentInputValue.student_id' => $student_id,
                                            'StudentInputValue.student_lesson_id' => $sl['StudentLesson']['id'],
                                        ),
                                        'fields' => array(
                                            'StudentInputValue.id',
                                            'StudentInputValue.nota_1',
                                            'StudentInputValue.nota_2',
                                            'StudentInputValue.nota_3',
                                            'StudentInputValue.nota_4',
                                            'StudentInputValue.nota_6',
                                            'StudentInputValue.nota_7',
                                            'StudentInputValue.nota_8',
                                        )
                                    );
                                    $aulas = $this->Student->StudentInput->StudentInputValue->find("all", $options);

                                    $tmp2 = array(
                                        array(1, 2),
                                        array(3, 4),
                                        array(5, 6),
                                        array(7, 8),
                                    );

                                    foreach($tmp2 as $t2) {

                                        if($t2 == array(1, 2)) {
                                            $label = "Teste";
                                        }

                                        if($t2 == array(3, 4)) {
                                            $label = "Prova";
                                        }

                                        if($t2 == array(5, 6)) {
                                            $label = "Trabalho";
                                        }

                                        if($t2 == array(7, 8)) {
                                            $label = "Nota Bimestral";
                                        }

                                        $tmp = array(
                                            'esperado' => 0,
                                            'alcancado' => 0,
                                            'label' => $label
                                        );

                                        $materias[$materia_nome]['notas'][$t2[0] . "_" . $t2[1]] = $tmp;
                                    }

                                    foreach($aulas as $aula) {
                                        for($i = 1; $i <= 8; $i++) {
                                            if(!empty($aula['StudentInputValue']['nota_' . $i])) {
                                                // descobrir qual underline é essa nota
                                                if($i == 1 || $i == 2) {
                                                    if($i == 1) {
                                                        $materias[$materia_nome]['notas']['1_2']['esperado'] = $materias[$materia_nome]['notas']['1_2']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 2) {
                                                        $materias[$materia_nome]['notas']['1_2']['alcancado'] = $materias[$materia_nome]['notas']['1_2']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                                if($i == 3 || $i == 4) {
                                                    if($i == 3) {
                                                        $materias[$materia_nome]['notas']['3_4']['esperado'] = $materias[$materia_nome]['notas']['3_4']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 4) {
                                                        $materias[$materia_nome]['notas']['3_4']['alcancado'] = $materias[$materia_nome]['notas']['3_4']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                                if($i == 5 || $i == 6) {
                                                    if($i == 5) {
                                                        $materias[$materia_nome]['notas']['5_6']['esperado'] = $materias[$materia_nome]['notas']['5_6']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 6) {
                                                        $materias[$materia_nome]['notas']['5_6']['alcancado'] = $materias[$materia_nome]['notas']['5_6']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                                if($i == 7 || $i == 8) {
                                                    if($i == 7) {
                                                        $materias[$materia_nome]['notas']['7_8']['esperado'] = $materias[$materia_nome]['notas']['7_8']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 8) {
                                                        $materias[$materia_nome]['notas']['7_8']['alcancado'] = $materias[$materia_nome]['notas']['7_8']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                            }
                                        }
                                    }
                                }
                            }

                            foreach($materias as $materia_i => $materia) {
                                $tem_nota = false;

                                foreach($materia['notas'] as $nota) :
                                    if($nota['esperado'] > 0 || $nota['alcancado'] > 0) {
                                        $tem_nota = true;
                                    }
                                endforeach;

                                if(!$tem_nota) {
                                    unset($materias[$materia_i]);
                                }
                            }

                }
            }

            // gera o array de configurações do CanvasJS
            $config = array(
                'axisX' => array('gridDashType' => 'dot', 'gridThickness' => 0),
                'axisY' => array('gridDashType' => 'dot', 'gridThickness' => 2),
                'backgroundColor' => 'transparent',
                'height' => $c['Chart']['height'],
                'toolTip' => array('enabled' => true),
                'title'                      => array(
                    'text'                  => $c['Chart']['name']
                ),
                'data'                      => array(
                    0 => array(
                        'type' => $c['Chart']['type'],
                        'dataPoints'    => $dataPoints
                    )
                )
            );

            if(isset($is_bar) && $is_bar == true) {
                $config['data'] = $dataPoints;
            }

            // inclui as configs em JSON de cada gráfico
            if(!empty($dataPoints)) {
                $charts[$x]['config'] = json_encode($config);
            }

        }

        // envia os gráficos pra view
        $this->set(compact("charts", "tem_busca", "s", "busca_de_data", "materias"));
    }

    public function index() {
        $this->layout = "ajax";
        $this->set("title_for_layout", "Evolução do Aluno");

        $student_id = AuthComponent::user("Student.Student.id");

        $date_start = $this->Session->read("date_start");
        $date_finish = $this->Session->read("date_finish");

        $conditions = array(
            "StudentInputValue.student_id" => $student_id
        );

        if(!empty($date_start) && !empty($date_finish)) {
            $conditions['StudentInputValue.date BETWEEN ? AND ?'] = array($date_start->format("Y-m-d"), $date_finish->format("Y-m-d"));

            $tem_busca = true;
            $busca_de_data = true;

            $this->Session->delete("date_start");
            $this->Session->delete("date_finish");
        } else {
            $tem_busca = false;
            $dateTime = new DateTime();

            $date_start     =  new DateTime($dateTime->format("Y-m-") . "01");
            $date_finish    = $dateTime;

            $date_finish = new DateTime($date_finish->format("Y-m-t"));
        }

        $this->set(compact("date_start", "date_finish"));

        $options = array(
            'conditions' => array(
                'Chart.student_id'  => $student_id
            ),
            'contain' => array(
                'ChartStudentInput' => array(
                    'StudentInput' => array(
                        'StudentInputValue' => array(
                            'conditions' => $conditions
                        ),
                        'Input'
                    )
                )
            ),
            'order' => array(
                'Chart.order ASC'
            )
        );
        $charts = $this->Chart->find("all", $options);

        $this->loadModel("StudentInputValue");

        $options = array(
            'conditions' => array(
                'StudentInputValue.student_id' => $student_id,
            )
        );
        $sivs_por_materia = $this->StudentInputValue->find("all", $options);

        $sivs_por_materia2 = array();

        foreach($sivs_por_materia as $siv) {
            $date = $siv['StudentInputValue']['date'];

            if(!empty($siv['StudentInputValue']['student_lesson_id'])) {
                $sivs_por_materia2[$date][] = $siv['StudentInputValue']['student_lesson_id'];
            }
        }

        // itera os gráficos existentes
        foreach($charts as $x => $c) {

            // configura os dataPoints

            // SE FOR PIZZA, DATAPOINT DE PIZZA
            if($c['Chart']['type'] == 'pie') {
                $tmp = $this->Chart->datapointPie($c, $sivs_por_materia2);

                $is_bar = true;

                $dataPoints = $tmp['data'];
            }

            // SE FOR DONUT, DATAPOINT DE DONUT
            if($c['Chart']['type'] == 'doughnut') {
                $tmp = $this->Chart->datapointPie($c, $sivs_por_materia2);

                $is_bar = true;
                
                $dataPoints = $tmp['data'];
            }

            // SE FOR LINHA, DATAPOINT DE LINHA
            if($c['Chart']['type'] == 'line') {
                $tmp = $this->Chart->datapointLine($c, $sivs_por_materia2);

                $is_bar = true;
                $dataPoints = $tmp['dataPoints'];
            }
            
            // SE FOR BARRA, DATAPOINT DE BARRA
            if($c['Chart']['type'] == 'bar') {
                $tmp = $this->Chart->datapointBar($c, $sivs_por_materia2);

                $is_bar = true;

                $dataPoints = $tmp['data'];
            }

            // SE FOR COLUNA, DATAPOINT DE COLUNA
            if($c['Chart']['type'] == 'column') {
                $tmp = $this->Chart->datapointColumn($c, $sivs_por_materia2);

                $is_bar = true;
                
                $dataPoints = $tmp['data'];
            }

            // SE FOR NÚMERO ABSOLUTO, DATAPOINT DE NÚMERO ABSOLUTO
            if($c['Chart']['type'] == 'num_absoluto') {
                $tmp = $this->Chart->datapointNumAbsoluto($c, $sivs_por_materia2);

                $dataPoints = $tmp['dataPoints'];

                if($c['Chart']['sub_type'] == "nota") {

                            // Buscar todas as matérias do estudante
                            $options = array(
                                'conditions' => array(
                                    'StudentLesson.student_id' => $student_id
                                )
                            );

                            $materias = array();
                            $student_lessons = $this->Student->StudentLesson->find("all", $options);

                            foreach($student_lessons as $sl) {
                                $materia_nome = $sl['StudentLesson']['name'];

                                if(!in_array($materia_nome, $materias)) {
                                    $materias[$materia_nome] = array(
                                        'nome' => $sl['StudentLesson']['name'],
                                        'notas' => array()
                                    );

                                    $options = array(
                                        'conditions' => array(
                                            'StudentInputValue.student_id' => $student_id,
                                            'StudentInputValue.student_lesson_id' => $sl['StudentLesson']['id'],
                                        ),
                                        'fields' => array(
                                            'StudentInputValue.id',
                                            'StudentInputValue.nota_1',
                                            'StudentInputValue.nota_2',
                                            'StudentInputValue.nota_3',
                                            'StudentInputValue.nota_4',
                                            'StudentInputValue.nota_6',
                                            'StudentInputValue.nota_7',
                                            'StudentInputValue.nota_8',
                                        )
                                    );
                                    $aulas = $this->Student->StudentInput->StudentInputValue->find("all", $options);

                                    $tmp2 = array(
                                        array(1, 2),
                                        array(3, 4),
                                        array(5, 6),
                                        array(7, 8),
                                    );

                                    foreach($tmp2 as $t2) {

                                        if($t2 == array(1, 2)) {
                                            $label = "Teste";
                                        }

                                        if($t2 == array(3, 4)) {
                                            $label = "Prova";
                                        }

                                        if($t2 == array(5, 6)) {
                                            $label = "Trabalho";
                                        }

                                        if($t2 == array(7, 8)) {
                                            $label = "Nota Bimestral";
                                        }

                                        $tmp = array(
                                            'esperado' => 0,
                                            'alcancado' => 0,
                                            'label' => $label
                                        );

                                        $materias[$materia_nome]['notas'][$t2[0] . "_" . $t2[1]] = $tmp;
                                    }

                                    foreach($aulas as $aula) {
                                        for($i = 1; $i <= 8; $i++) {
                                            if(!empty($aula['StudentInputValue']['nota_' . $i])) {
                                                // descobrir qual underline é essa nota
                                                if($i == 1 || $i == 2) {
                                                    if($i == 1) {
                                                        $materias[$materia_nome]['notas']['1_2']['esperado'] = $materias[$materia_nome]['notas']['1_2']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 2) {
                                                        $materias[$materia_nome]['notas']['1_2']['alcancado'] = $materias[$materia_nome]['notas']['1_2']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                                if($i == 3 || $i == 4) {
                                                    if($i == 3) {
                                                        $materias[$materia_nome]['notas']['3_4']['esperado'] = $materias[$materia_nome]['notas']['3_4']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 4) {
                                                        $materias[$materia_nome]['notas']['3_4']['alcancado'] = $materias[$materia_nome]['notas']['3_4']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                                if($i == 5 || $i == 6) {
                                                    if($i == 5) {
                                                        $materias[$materia_nome]['notas']['5_6']['esperado'] = $materias[$materia_nome]['notas']['5_6']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 6) {
                                                        $materias[$materia_nome]['notas']['5_6']['alcancado'] = $materias[$materia_nome]['notas']['5_6']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                                if($i == 7 || $i == 8) {
                                                    if($i == 7) {
                                                        $materias[$materia_nome]['notas']['7_8']['esperado'] = $materias[$materia_nome]['notas']['7_8']['esperado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                    if($i == 8) {
                                                        $materias[$materia_nome]['notas']['7_8']['alcancado'] = $materias[$materia_nome]['notas']['7_8']['alcancado'] + $aula['StudentInputValue']['nota_' . $i];
                                                    }
                                                }

                                            }
                                        }
                                    }
                                }
                            }

                            foreach($materias as $materia_i => $materia) {
                                $tem_nota = false;

                                foreach($materia['notas'] as $nota) :
                                    if($nota['esperado'] > 0 || $nota['alcancado'] > 0) {
                                        $tem_nota = true;
                                    }
                                endforeach;

                                if(!$tem_nota) {
                                    unset($materias[$materia_i]);
                                }
                            }

                }
            }

            $maior_numero = false;
            foreach($c['ChartStudentInput'] as $csi) {

                if(is_string($csi['StudentInput']['config'])) {
                    $config = unserialize($csi['StudentInput']['config']);
                } else {
                    $config = $csi['StudentInput']['config'];
                }

                if(!empty($config['range_end'])) {
                    $range_end = $config['range_end'];
                }

                if(!empty($range_end)) {
                    $maior_numero = $range_end;
                }
            }

            // gera o array de configurações do CanvasJS
            $config = array(
                'backgroundColor' => 'transparent',
                'height' => $c['Chart']['height'],
                'toolTip' => array('enabled' => true),
                'title'                      => array(
                    'text'                  => $c['Chart']['name']
                ),
                'data'                      => array(
                    0 => array(
                        'type' => $c['Chart']['type'],
                        'dataPoints'    => $dataPoints
                    )
                )
            );

            if($maior_numero) {
                $config['axisY'] = array('maximum' => $maior_numero);
            }

            if(isset($is_bar) && $is_bar == true) {
                $config['data'] = $dataPoints;
            }

            // inclui as configs em JSON de cada gráfico
            if(!empty($dataPoints)) {
                $charts[$x]['config'] = json_encode($config);
            }

        }

        // envia os gráficos pra view
        $this->set(compact("charts", "tem_busca", "s", "busca_de_data", "materias"));
    }
}