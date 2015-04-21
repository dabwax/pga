<?php
class SearchController extends AppController {
    public $uses = false;

    public function clear($hash = null) {

            $this->Session->delete("date_start");
            $this->Session->delete("date_finish");
            $this->Session->delete("s");

        $this->Session->setFlash(__("A busca foi limpada."), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-success'
        ));

        return $this->redirect("/#" . $hash);
    }
    
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
    
    public function input_index() {
        $this->autoRender = false;

        $date_start = DateTime::createFromFormat("d/m/Y", $this->request->data['Search']['date_start']);
        $date_finish = DateTime::createFromFormat("d/m/Y", $this->request->data['Search']['date_finish']);

        $this->Session->write("date_start", $date_start);
        $this->Session->write("date_finish", $date_finish);

        $this->Session->setFlash(__("O filtro de " . $date_start->format('d/m/Y') . " até " . $date_finish->format("d/m/Y") ." foi aplicado."), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-success'
        ));

        return $this->redirect("/#input_arquivo");
    }

    public function input_busca() {
        $this->autoRender = false;

        $s = $this->request->data['Search']['s'];

        $this->Session->write("s", $s);

        $this->Session->setFlash(__("O filtro de palavras para '" . $s . "' foi aplicado."), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-success'
        ));

        return $this->redirect("/#input_arquivo");
    }
}