<?php
class ExportacaoController extends AdminAppController {
    public $uses = array("Student");

    public function input() {
        // layout vazio
        $this->layout = "ajax";

        // dados
        $atores = $this->request->data['Input']['actor'];
        $data_inicial = $this->request->data['Input']['date_start'];
        $data_final = $this->request->data['Input']['date_end'];
        $inputs = $this->request->data['Input']['student_input_id'];
        $materias = $this->request->data['Input']['student_lesson_id'];
        $student_id = $this->request->data['Input']['student_id'];
        $formato = $this->request->data['Input']['formato'];

        $options = array(
            'conditions' => array(
                'AND' => array(
                    'StudentInputValue.student_id' => $student_id
                ),
                'OR' => array()
            ),
            'contain' => array(
                'Student',
                'StudentInput',
                'StudentLesson',
            )
        );

        // condicional de atores
        if(!empty($atores)) {
            $options['conditions']['OR']['StudentInputValue.actor'] = $atores;
        }

        // condicional de datas
        if(!empty($data_inicial)) {
            $datetime = DateTime::createFromFormat("d/m/Y", $data_inicial);
            $options['conditions']['AND']['StudentInputValue.date >='] = $datetime->format("Y-m-d");
        }

        if(!empty($data_final)) {
            $datetime = DateTime::createFromFormat("d/m/Y", $data_final);
            $options['conditions']['AND']['StudentInputValue.date <='] = $datetime->format("Y-m-d");
        }

        // condicional de inputs
        if(!empty($inputs)) {
            $options['conditions']['OR']['StudentInputValue.student_input_id'] = $inputs;
        }

        // condicional de materias
        if(!empty($inputs)) {
            $options['conditions']['OR']['StudentInputValue.student_lesson_id'] = $inputs;
        }

        // executa a busca
        $find = $this->Student->StudentInput->StudentInputValue->find("all", $options);

        $this->set(compact("find"));

        require_once APP . 'Vendor' . DS . 'PHPExcel' . DS . 'PHPExcel.php';

        // Instanciamos a classe
        $objPHPExcel = new PHPExcel();

        // Definimos o estilo da fonte
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);

        // Criamos as colunas
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Num' )
                    ->setCellValue('B1', 'Data' )
                    ->setCellValue('C1', "Estudante" )
                    ->setCellValue("D1", "Ator" )
                    ->setCellValue("E1", "Matéria" )
                    ->setCellValue("F1", "Campo" )
                    ->setCellValue("G1", "Valor" );
        $i = 2;
        foreach($find as $f) :
            // Também podemos escolher a posição exata aonde o dado será inserido (coluna, linha, dado);
            $datetime = DateTime::createFromFormat("d/m/Y", $f['StudentInputValue']['date']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $i, $i);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $i, $datetime->format("d/m/Y"));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $i, $f['Student']['name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $i, ucfirst($f['StudentInputValue']['actor']));
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $i, $f['StudentLesson']['name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $i, $f['StudentInput']['name']);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $i, $f['StudentInputValue']['value']);
        $i++; endforeach;

        // Podemos renomear o nome das planilha atual, lembrando que um único arquivo pode ter várias planilhas
        $objPHPExcel->getActiveSheet()->setTitle('Exportação de Inputs PGA');

        // Cabeçalho do arquivo para ele baixar
        header('Content-Type: application/vnd.ms-excel');

        if($formato == "Excel5") {
            $ext = "xls";
        } else {
            $ext = "csv";
        }

        header('Content-Disposition: attachment;filename="exportacao-inputs-PGA.' . $ext . '"');
        header('Cache-Control: max-age=0');
        // Se for o IE9, isso talvez seja necessário
        header('Cache-Control: max-age=1');

        // Acessamos o 'Writer' para poder salvar o arquivo
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $formato);

        // Salva diretamente no output, poderíamos mudar arqui para um nome de arquivo em um diretório ,caso não quisessemos jogar na tela
        $objWriter->save('php://output');

        die();

    }
}