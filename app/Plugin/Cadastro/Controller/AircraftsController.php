<?php

class AircraftsController extends CadastroAppController {
    public $uses = array('Cadastro.Aircraft', 'Cadastro.AircraftBasis');

    public function add_aircraft_basis() {
        if($this->request->is("post")) {

            $this->AircraftBasis->create();
            $this->AircraftBasis->save($this->request->data);

            $this->Session->setFlash(__('A base foi adicionada a aeronave com sucesso.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
        }

        return $this->redirect( array('action' => 'edit', $this->request->data['AircraftBasis']['aircraft_id']) );
    }

    public function delete_aircraft_basis($id = null) {
        $this->loadModel("Cadastro.AircraftBasis");

        $this->AircraftBasis->id = $id;

        if (!$this->AircraftBasis->exists()) {
            throw new NotFoundException(__('Invalid AircraftBasis'));
        }

        $tmp = $this->AircraftBasis->read();

        if ($this->AircraftBasis->delete()) {
            $this->Session->setFlash(__('A base foi removida da aeronave.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));
        } else {
            $this->Session->setFlash(__('A base não pôde ser removida.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
        }

        return $this->redirect(array('action' => 'edit', $tmp['AircraftBasis']['aircraft_id']));
    }

    public function allocate($id) {
        $options = array(
            'conditions'        => array(
                'Aircraft.id'   => $id
            )
        );

        $aircraft = $this->Aircraft->find('first', $options);
        $bases = $this->AircraftBasis->Basis->find("list");

        $options = array(
            'conditions'                    => array(
                'AircraftBasis.aircraft_id' => $id
            ),
            'contain'                       => array(
                'Basis'
            )
        );
        $allocates = $this->AircraftBasis->find("all", $options);

        $this->set(compact("aircraft", "bases", "allocates"));

        if($this->request->is("post")) {
            $this->AircraftBasis->create();

            if ($this->AircraftBasis->save($this->request->data)) {

                $options = array(
                    'conditions'    => array(
                        'Basis.id'  => $this->request->data["AircraftBasis"]["basis_id"]
                    )
                );

                $basis = $this->AircraftBasis->Basis->find('first', $options);

                $this->Session->setFlash(__('A aeronave "' . $aircraft["Aircraft"]["registration"] . '" foi alocada para a base "' . $basis["Basis"]["name"] . '" no período de ' . $this->request->data["AircraftBasis"]["start"] .' a ' . $this->request->data["AircraftBasis"]["end"] . '.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar a alocação. Verifique os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
            }
        }
    }
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set("title_for_layout", "Listar Aeronaves");
        $this->Aircraft->recursive = 0;
        $this->Paginator->settings = array("limit" => 9999);
        $this->set('aircrafts', $this->Paginator->paginate());
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $this->set("title_for_layout", "Cadastrar Aeronave");
        $aircraft_models = $this->Aircraft->AircraftModel->find("list");
        $this->set(compact("aircraft_models"));

        if ($this->request->is('post')) {
            $this->Aircraft->create();
            if ($this->Aircraft->save($this->request->data)) {
                $this->Session->setFlash(__('A aeronave foi salva.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar a aeronave. Verifique os dados do formulário.'), 'alert', array(
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
        $this->set("title_for_layout", "Editar Aeronave");


            $options = array(
                'conditions' => array(
                    'Aircraft.' . $this->Aircraft->primaryKey => $id
                ),
                'contain' => array(
                    'AircraftModel' => array(
                        'Schedule' => array(
                            'ScheduleGrade' => array(
                                'ScheduleGradeAircraft' => array(
                                    'Basis'
                                )
                            )
                        )
                    )
                )
            );
            $tmp = $this->Aircraft->find('first', $options);

        if (!$this->Aircraft->exists($id)) {
            throw new NotFoundException(__('Invalid aircraft'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Aircraft->save($this->request->data)) {
                $this->Session->setFlash(__('A aeronave foi salva.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar a aeronave. Verifique os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
            }
        } else {
            $this->request->data = $tmp;
        }
        $aircraft_models = $this->Aircraft->AircraftModel->find("list");
        $sgb = $tmp;

        $this->set(compact("sgb", "aircraft_bases", "aircraft_models", "bases"));

    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Aircraft->id = $id;

        if (!$this->Aircraft->exists()) {
            throw new NotFoundException(__('Invalid aircraft'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Aircraft->delete()) {
                $this->Session->setFlash(__('A aeronave foi removida.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
        } else {
            $this->Session->setFlash(__('Não foi possível remover a aeronave.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-warning'
                ));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
