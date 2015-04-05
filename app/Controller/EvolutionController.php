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
            )
        );
        $charts = $this->Chart->find("all", $options);

        // itera os gráficos existentes
        foreach($charts as $x => $c) {

            // configura os dataPoints

            // SE FOR PIZZA, DATAPOINT DE PIZZA
            if($c['Chart']['type'] == 'pie') {

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
            }

            // SE FOR LINHA, DATAPOINT DE LINHA
            if($c['Chart']['type'] == 'line') {
                $dataPoints = '';

                $dataPoints .= '{x: new Date(2012, 00, 1), y: 450}';
                $dataPoints .= ',{x: new Date(2012, 00, 3), y: 340}';
            }

            // gera o array de configurações do CanvasJS
            $config = array(
                'backgroundColor' => 'transparent',
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
            $charts[$x]['config'] = json_encode($config);
        }

        // envia os gráficos pra view
        $this->set(compact("charts"));
    }
}