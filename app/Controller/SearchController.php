<?php
class SearchController extends AppController {
    public $uses = false;   
    
    public function index() {
        $this->autoRender = false;

        $date_start = DateTime::createFromFormat("d/m/Y", $this->request->data['Search']['date_start']);
        $date_finish = DateTime::createFromFormat("d/m/Y", $this->request->data['Search']['date_finish']);

        $this->Session->write("date_start", $date_start);
        $this->Session->write("date_finish", $date_finish);

        $this->Session->setFlash(__("O filtro de " . $date_start->format('d/m/Y') . " até " . $date_finish->format("d/m/Y") ." foi aplicado."), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-success'
        ));

        return $this->redirect("/#feed");
    }
}