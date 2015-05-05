<?php
class RolesController extends CadastroAppController {
    public $uses = array('Cadastro.Role');

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set("title_for_layout", "Listar Cargos");
        $this->set('roles', $this->Role->find("all"));
    }

    public function dailies() {
        $this->loadModel("TrainingDaily");

        if($this->request->is("get")) {
            $this->request->data = $this->TrainingDaily->find("first");
        } else {

                $this->Session->setFlash(__('Os valores foram editados.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));

            $this->TrainingDaily->save($this->request->data);
            return $this->redirect( array('action' => 'dailies') );
        }
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $this->set("title_for_layout", "Cadastrar Cargo");

        if ($this->request->is('post')) {
            $this->Role->create();
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('O cargo foi salvo.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o cargo. Verifique os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
            }
        }
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->set("title_for_layout", "Editar Cargo");

        if (!$this->Role->exists($id)) {
            throw new NotFoundException(__('Invalid role'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('O cargo foi salvo.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o cargo. Verifique os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
            }
        } else {
            $options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
            $this->request->data = $this->Role->find('first', $options);
        }
        
        $this->Role->recursive = 0;

    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Role->id = $id;

        if (!$this->Role->exists()) {
            throw new NotFoundException(__('Invalid role'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Role->delete()) {
                $this->Session->setFlash(__('O cargo foi removido.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o cargo.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-warning'
            ));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
