<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	public $actsAs = array("Containable");

	/**
	 * Organiza o upload.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function upload($imagem = array(), $dir = 'uploads')
	{
		$dir = WWW_ROOT.$dir.DS;

		if(($imagem['error']!=0) and ($imagem['size']==0)) {
			throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
		}

		$this->checa_dir($dir);

		$imagem = $this->checa_nome($imagem, $dir);

		$this->move_arquivos($imagem, $dir);

		return $imagem['name'];
	}

	/**
	 * Verifica se o diretório existe, se não ele cria.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function checa_dir($dir)
	{
		App::uses('Folder', 'Utility');
		$folder = new Folder();
		if (!is_dir($dir)){
			$folder->create($dir);
		}
	}

	/**
	 * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	 * @return nome da imagem
	*/ 
	public function checa_nome($imagem, $dir)
	{
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
	public function trata_nome($imagem_nome)
	{
		$imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
		return $imagem_nome;
	}

	/**
	 * Move o arquivo para a pasta de destino.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function move_arquivos($imagem, $dir)
	{
		App::uses('File', 'Utility');
		$arquivo = new File($imagem['tmp_name']);
		$arquivo->copy($dir.$imagem['name']);
		$arquivo->close();
	}
}
