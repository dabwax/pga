<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class ToolsController extends CadastroAppController {

    public $uses = array("Cadastro.FileUpload");

    public function teste() {
        $this->layout = "ajax";
        $this->autoRender = false;

        $file = new File(APP . 'webroot/uploads/tmp.txt');
        $read = $file->read();
        $linhas = explode("\r\n", $read);


        // descobre as colunas
        $colunas = explode(";", $linhas[0]);

        // limpa colunas inuteis
        unset($colunas[0]);
        unset($colunas[19]);

        // limpa a linha de colunagem
        unset($linhas[0]);

        $dados_temporarios = array();

        // itera as linhas
        foreach($linhas as $i => $linha) {
            $dados = explode(";", $linha);

            // remove linha inutil
            unset($dados[0]);

            $dados_temporarios[$i] = array();

            foreach($colunas as $num => $coluna) {
                $coluna = strtolower(Inflector::slug($coluna));

                $dados_temporarios[$i][$coluna] = $dados[$num];
            }
        }
    }

    public function download($id) {
        $this->viewClass = 'Media';

        $tmp = $this->FileUpload->findById($id);
        $filename = $tmp['FileUpload']['attachment'];

        $params = array(
            'download'  => true,
            'path'      => 'webroot' . DS . 'uploads' . DS . $filename
        );
        $this->set($params);
    }

    public function import() {
        $options = array(
            'contain' => array(
                'User'
            )
        );
        $file_uploads = $this->FileUpload->find("all", $options);

        $this->set(compact("file_uploads"));

        if($this->request->is("post")) {
            $this->FileUpload->create();
            $this->FileUpload->save($this->request->data);

            $this->Session->setFlash(__('O arquivo foi importado com sucesso.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));

            return $this->redirect( array('action' => 'import', '#' => $this->request->data['FileUpload']['type']) );
        }
    }
}