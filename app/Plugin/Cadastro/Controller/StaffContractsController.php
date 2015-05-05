<?php
class StaffContractsController extends CadastroAppController {

    public $uses = array(
        "Contract",
        "Cadastro.StaffContract"
    );
    
    public function add($staff_id) {
        $this->layout = "iframe";

        $contracts = $this->Contract->find("list");

        $this->set(compact("contracts", "staff_id"));

        if ($this->request->is('post')) {
            $this->StaffContract->create();
            
            if ($this->StaffContract->save($this->request->data)) {

                $this->Session->setFlash(__('O contrato foi salvo.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                
            } else {
                $this->Session->setFlash(__('A contrato não pôde ser salvo. Confirme os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
        }
    }
    
    public function edit($id, $staff_id) {
        $this->layout = "iframe";

        $contracts = $this->Contract->find("list");

        $this->set(compact("contracts", "staff_id"));

        if ($this->request->is('get')) {
        	$this->StaffContract->id = $id;

        	$this->request->data = $this->StaffContract->read();
        } else {

        	$this->request->data['StaffContract']['id'] = $id;
            
            if ($this->StaffContract->save($this->request->data)) {

                $this->Session->setFlash(__('O contrato foi salvo.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                
            } else {
                $this->Session->setFlash(__('A contrato não pôde ser salvo. Confirme os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
        }
    }
    
    public function delete($id, $staff_id) {
        $this->layout = "iframe";

            if ($this->StaffContract->delete($id)) {

                $this->Session->setFlash(__('O contrato foi deletado.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                
            } else {
                $this->Session->setFlash(__('A contrato não pôde ser deletado. Confirme os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
    }
}