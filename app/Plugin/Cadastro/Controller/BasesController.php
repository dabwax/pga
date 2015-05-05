<?php
class BasesController extends CadastroAppController {

    public function add_aircraft_basis() {
        $this->loadModel("Cadastro.AircraftBasis");

        if($this->request->is("post")) {

            $this->AircraftBasis->create();
            $this->AircraftBasis->save($this->request->data);

            $this->Session->setFlash(__('A aeronave foi adicionada a base com sucesso.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
        }

        return $this->redirect( array('action' => 'edit', $this->request->data['AircraftBasis']['basis_id']) );
    }

    public function delete_aircraft_basis($id = null) {
        $this->loadModel("Cadastro.AircraftBasis");

        $this->AircraftBasis->id = $id;

        if (!$this->AircraftBasis->exists()) {
            throw new NotFoundException(__('Invalid AircraftBasis'));
        }

        $tmp = $this->AircraftBasis->read();

        if ($this->AircraftBasis->delete()) {
            $this->Session->setFlash(__('A aeronave foi removida da base.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
        } else {
            $this->Session->setFlash(__('A aeronave não pôde ser removida.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
        }

        return $this->redirect(array('action' => 'edit', $tmp['AircraftBasis']['basis_id']));
    }

    public function index() {
        $this->set("title_for_layout", "Listar Bases");
        $this->set('bases', $this->Basis->find("all"));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $this->set("title_for_layout", "Cadastrar Base");
        $estados = $this->Basis->getEstados();
        $this->set(compact("estados"));

        if ($this->request->is('post')) {
            $this->Basis->create();
            if ($this->Basis->save($this->request->data)) {
                $this->Session->setFlash(__('A base foi salva.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('A base não pôde ser salva. Verifique os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
            }
        }
        $staffs = $this->Basis->Staff->find('list');
        $this->set(compact('staffs'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->set("title_for_layout", "Editar Base");
        $estados = $this->Basis->getEstados();
        $this->set(compact("estados"));

        if (!$this->Basis->exists($id)) {
            throw new NotFoundException(__('Invalid basis'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Basis->save($this->request->data)) {
                $this->Session->setFlash(__('A base foi salva.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('A base não pôde ser salva. Verifique os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
            }
        } else {
            $options = array('conditions' => array('Basis.' . $this->Basis->primaryKey => $id));
            $this->request->data = $this->Basis->find('first', $options);
        }
        $staffs = $this->Basis->Staff->find('list');

        // Busca os dados da aba Aeronaves Alocadas
        // carrega os models necessários
        $this->loadModel("Escala.ScheduleGradeAircraft");
        $this->loadModel("Escala.ScheduleGradeBase");

        // busca os dados de aeronaves alocadas
        $options = array(
            'conditions' => array(
                'ScheduleGradeAircraft.basis_id' => $id
            ),
            'contain' => array(
                'Aircraft' => array(
                    'AircraftModel'
                ),
                'ScheduleGrade' => array(
                    'Schedule',
                    'conditions' => array(
                        'ScheduleGrade.status' => "aprovada"
                    )
                ),
            )
        );
        $sga = $this->ScheduleGradeAircraft->find("all", $options);

        // busca os dados de representantes/chefes de base alocados
        $options = array(
            'conditions' => array(
                'ScheduleGradeBase.basis_id' => $id
            ),
            'contain' => array(
                'Staff',
                'Designation',
                'ScheduleGrade' => array(
                    'Schedule',
                    'conditions' => array(
                        'ScheduleGrade.status' => "aprovada"
                    )
                )
            )
        );
        $sgb = $this->ScheduleGradeBase->find("all", $options);

        $this->set(compact('staffs', 'aircrafts', 'aircraft_bases', 'sga', 'sgb'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Basis->id = $id;
        if (!$this->Basis->exists()) {
            throw new NotFoundException(__('Invalid basis'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Basis->delete()) {
            $this->Session->setFlash(__('A base foi removida.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
        } else {
            $this->Session->setFlash(__('A base não pôde ser removida.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
