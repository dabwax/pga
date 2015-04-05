<?php
class StudentExercise extends AppModel {
    public $belongsTo = array("Student", "StudentLesson");

    public function beforeSave($options = array()) {

        if (isset($this->data[$this->alias]['date'])) {
            $oDateTime = DateTime::createFromFormat("d/m/Y", $this->data[$this->alias]['date']);
            $this->data[$this->alias]['date'] = $oDateTime->format("Y-m-d");
        }

        if (isset($this->data[$this->alias]['due_to'])) {
            $oDateTime = DateTime::createFromFormat("d/m/Y", $this->data[$this->alias]['due_to']);
            $this->data[$this->alias]['due_to'] = $oDateTime->format("Y-m-d");
        }

        if (!empty($this->data[$this->alias]['attachment']['name'])) {
            $this->data[$this->alias]['attachment'] = $this->upload($this->data[$this->alias]['attachment']);
        } else {
            unset($this->data[$this->alias]['attachment']);
        }

        return true;
    }

    public function afterFind($results = array(), $primary = false) {
        foreach($results as $i => $result) {
            if(!empty($result[$this->alias]['date'])) {
                $oDateTime = new DateTime($result[$this->alias]['date']);
                $results[$i][$this->alias]['date'] = $oDateTime->format("d/m/Y");
            }

            if(!empty($result[$this->alias]['due_to'])) {
                $oDateTime = new DateTime($result[$this->alias]['due_to']);
                $results[$i][$this->alias]['due_to'] = $oDateTime->format("d/m/Y");
            }
        }

        return $results;
    }

    public function upload($imagem = array(), $dir = 'files') {
        $dir = WWW_ROOT.$dir.DS;

        if(($imagem['error']!=0) and ($imagem['size']==0)) {
            throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
        }

        $this->checa_dir($dir);

        $imagem = $this->checa_nome($imagem, $dir);

        $this->move_arquivos($imagem, $dir);

        return $imagem['name'];
    }

    public function checa_dir($dir) {
        App::uses('Folder', 'Utility');
        $folder = new Folder();
        if (!is_dir($dir)){
            $folder->create($dir);
        }
    }

    public function checa_nome($imagem, $dir) {
        $imagem_info = pathinfo($dir.$imagem['name']);
        $imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
        debug($imagem_nome);
        $conta = 2;
        while (file_exists($dir.$imagem_nome)) {
            $imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
            $imagem_nome .= '.'.$imagem_info['extension'];
            $conta++;
            debug($imagem_nome);
        }
        $imagem['name'] = $imagem_nome;
        return $imagem;
    }

    /**
     * Trata o nome removendo espaços, acentos e caracteres em maiúsculo.
     * @access public
     * @param Array $imagem
     * @param String $data
    */
    public function trata_nome($imagem_nome) {
        $imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
        return $imagem_nome;
    }

    /**
     * Move o arquivo para a pasta de destino.
     * @access public
     * @param Array $imagem
     * @param String $data
    */
    public function move_arquivos($imagem, $dir) {
        App::uses('File', 'Utility');
        $arquivo = new File($imagem['tmp_name']);
        $arquivo->copy($dir.$imagem['name']);
        $arquivo->close();
    }

}