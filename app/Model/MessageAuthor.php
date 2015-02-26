<?php
class MessageAuthor extends AppModel {
	public $belongsTo = array("Message");

	// callback usado para buscar o nome do autor da mensagem
	public function afterFind($results, $primary = false) {
	    foreach ($results as $key => $val) {
	        if (isset($val[$this->alias]['model'])) {

	        	// shortcut
	        	$dados = $val[$this->alias];

	        	$ForeignModel = ClassRegistry::init($dados["model"]);

	        	$search = $ForeignModel->find("first", array(
	        		"conditions" => array(
	        			$dados["model"] . ".id" => $dados["foreign_key"],
	        		)
        		) );

	            $results[$key][$this->alias]['name'] = $search[$dados["model"]][$dados["prefix"] . "name"];
	        }
	    }
	    
	    return $results;
	}
}