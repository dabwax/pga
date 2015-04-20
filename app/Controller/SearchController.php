<?php
class SearchController extends AppController {
    public $uses = false;   
    
    public function feed_index() {
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

    public function feed_busca() {
        $this->autoRender = false;

        $s = $this->request->data['Search']['s'];

        $this->Session->write("s", $s);

        $this->Session->setFlash(__("O filtro de palavras para '" . $s . "' foi aplicado."), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-success'
        ));

        return $this->redirect("/#feed");
    }
}