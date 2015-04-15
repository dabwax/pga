<?php
/**
 * Páginas envolvendo evolução encontram-se aqui.
 */
class EvolutionController extends AppController {
    public $uses = array("Chart");

    public function index() {
        $this->layout = "ajax";
        $this->set("title_for_layout", "Evolução do Aluno");

        $student_id = AuthComponent::user("Student.Student.id");

        $options = array(
            'conditions' => array(
                'Chart.student_id'  => $student_id
            ),
            'contain' => array(
                'ChartStudentInput' => array(
                    'StudentInput' => array(
                        'StudentInputValue',
                        'Input'
                    )
                )
            ),
            'order' => array(
                'Chart.order DESC'
            )
        );
        $charts = $this->Chart->find("all", $options);

        // itera os gráficos existentes
        foreach($charts as $x => $c) {

            // configura os dataPoints

            // SE FOR PIZZA, DATAPOINT DE PIZZA
            if($c['Chart']['type'] == 'pie') {
                $tmp = $this->Chart->datapointPie($c);

                $data = $tmp['data'];
                $dataPoints = $tmp['dataPoints'];
            }

            // SE FOR DONUT, DATAPOINT DE DONUT
            if($c['Chart']['type'] == 'doughnut') {
                $tmp = $this->Chart->datapointPie($c);

                $data = $tmp['data'];
                $dataPoints = $tmp['dataPoints'];
            }

            // SE FOR LINHA, DATAPOINT DE LINHA
            if($c['Chart']['type'] == 'line') {
                $tmp = $this->Chart->datapointLine($c);

                $dataPoints = $tmp['dataPoints'];
            }
            
            // SE FOR BARRA, DATAPOINT DE BARRA
            if($c['Chart']['type'] == 'bar') {
                $tmp = $this->Chart->datapointBar($c);

                $dataPoints = $tmp['dataPoints'];
            }

            // SE FOR COLUNA, DATAPOINT DE COLUNA
            if($c['Chart']['type'] == 'column') {
                $tmp = $this->Chart->datapointColumn($c);

                $dataPoints = $tmp['dataPoints'];
            }

            // gera o array de configurações do CanvasJS
            $config = array(
                'backgroundColor' => 'transparent',
                'toolTip' => array('enabled' => false),
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

            // inclui as configs em JSON de cada gráfico
            if(!empty($dataPoints)) {
                $charts[$x]['config'] = json_encode($config);
            }
        }

        // envia os gráficos pra view
        $this->set(compact("charts"));
    }
}