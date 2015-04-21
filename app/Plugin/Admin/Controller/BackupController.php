<?php

class BackupController extends AdminAppController {
    public $uses = array("Setting");

    public function download() {
    	$this->layout = "ajax";
    	$this->autoRender = false;

    	$db = $this->Setting->exportDatabase();
    	$this->response->file($db['file']);
    }
}