<?php
class StaffsController extends CadastroAppController {
    public $uses = array('Cadastro.Staff');

    public function delete_item() {
        $model = $this->params['named']['model'];
        $id = $this->params['named']['id'];
        $staff = $this->params['named']['staff'];

        $this->loadModel("Cadastro." . $model);

        $this->$model->delete($id);

        $this->Session->setFlash(__('O item foi removido.'), 'alert', array(
            'plugin' => 'BoostCake',
            'class'  => 'alert-success',
        ));

        return $this->redirect( array('action' => 'edit', $staff) );

        $this->autoRender = false;
    }

    public function ajax_check_role_type() {
        $id = $_POST["id"];

        $this->loadModel("Cadastro.Role");

        $options = array(
            "conditions" => array(
                "Role.id" => $id,
            ),
        );
        $role = $this->Role->find("first", $options);

        $return = array();

        if ($role["Role"]["aircraft_model"] == 1) {
            $return[] = "aircraft_model";
        }

        if ($role["Role"]["base"] == 1) {
            $return[] = "base";
        }

        $this->set(compact("return"));
    }
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->loadModel("Notification");

        $this->set("title_for_layout", "Listar Tripulantes");

        $this->Paginator->settings = array("limit" => 9999, "contain" => array("StaffRole" => array("Role")));
        $this->set('staffs', $this->Paginator->paginate());
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {

        $this->set("title_for_layout", "Cadastrar Tripulante");
        $estados = $this->Staff->getEstados();
        $this->set(compact("estados"));

        if ($this->request->is('post')) {
            $this->Staff->create();
            if ($this->Staff->save($this->request->data)) {
                $this->Session->setFlash(__('O tripulante foi salvo.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class'  => 'alert-success',
                ));
                return $this->redirect(array("action" => "edit", $this->Staff->getInsertID()));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o tripulante. Verifique os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class'  => 'alert-warning',
                ));
            }
        }

    }

/**
 * Método utilizado para carregar todos models necessários na action "edit".
 *
 * @return void
 */
    protected function loadModels() {
        $this->loadModel("Treinamento.Certification");
        $this->loadModel("Cadastro.AircraftModel");
        $this->loadModel("Cadastro.Aircraft");
        $this->loadModel("Cadastro.Role");
        $this->loadModel("Treinamento.TrainingCertificationStaff");
    }

/**
 * Método utilizado para encapsular as regras de negócio ao salvar o tripulante.
 *
 * @return void
 */
    protected function saveStaff($data) {

        // salva quinzena se existir
        if (!empty($data["Staff"]["quinzena"])) {
            $this->Staff->saveQuinzena($data["Staff"]["id"], $data["Staff"]["quinzena"]);
            unset($data["Staff"]["quinzena"]);
        }

        if ($this->Staff->save($data)) {
            $this->Session->setFlash(__('Tripulante salvo com sucesso.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class'  => 'alert-success',
            ));
            return $this->redirect(array('controller' => 'staffs', 'action' => 'edit', $this->request->data["Staff"]["id"]));
        } else {
            $this->Session->setFlash(__('Não foi possível salvo o tripulante. Verifique os dados do formulário.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class'  => 'alert-warning',
            ));
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
        $this->set("title_for_layout", "Editar Tripulante");

        $estados = $this->Staff->getEstados();

        // carrega todos os models necessários
        $this->loadModels();

        $aircrafts       = $this->Aircraft->find("list");
        $aircraft_models = $this->AircraftModel->find("list");

        if (!$this->Staff->exists($id)) {
            throw new NotFoundException(__('Invalid staff'));
        }

        if ($this->request->is(array('post', 'put'))) {
            // regras de negócio para salvar o tripulante encapsuladas
            $this->saveStaff($this->request->data);
        } else {
            $options             = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
            $this->request->data = $this->Staff->find('first', $options);
        }

        $habilitacoes = $this->Staff->StaffLicence->findLicencesByStaffId($id);

        $voos = $this->Staff->StaffFlight->findFlightsByStaffId($id);

        $ferias = $this->Staff->StaffGrade->findGradesByStaffId($id, "ferias");

        $cargos = $this->Staff->StaffRole->findRolesByStaffId($id);

        $treinamento = $this->Staff->StaffCertification->findCertificationsByStaffId($id);

        $fb    = $this->Staff->StaffFlight->getFb();
        $roles = $this->Role->find("list");

        $codes = array(
            "CCF"              => "CCF",
            "CHT"              => "CHT",
            "Revisão Médica" => "Revisão Médica",
        );

        $ifrh = array(
            "IFRH"              => "IFRH",
        );

        $escalas = $this->Staff->StaffGrade->findGradesByStaffId($id, "escalas");

        //$aulas = $this->TrainingCertificationStaff->findAulas($id);

        $bases                = $this->Staff->StaffRole->Basis->find("list");
        $aircraft_models_mask = $this->Staff->StaffFlight->AircraftModel->find("list");

        $designations = $this->Staff->StaffDesignation->Designation->find("list");
        $certifications = $this->Staff->StaffCertification->Certification->find("list");
        $designacoes  = $this->Staff->StaffDesignation->find("all", array(
            "order"      => array(
                "StaffDesignation.date_start DESC",
            ),
            "conditions" => array(
                "StaffDesignation.staff_id" => $id,
            ),
            "contain"    => array(
                "Designation",
                "AircraftModel",
            ),
        ));

        $quinzenas = $this->Staff->StaffPeriod->find("all", array(
            "conditions" => array(
                "StaffPeriod.staff_id" => $id,
            ),
        ));

        $this->set(compact("ifrh", "quinzenas", "designations", "designacoes", "escalas", "aulas", "treinamento", "bases", "aircraft_models_mask", "codes", "estados", "aircraft_models", "aircrafts", "habilitacoes", "voos", "fb", "ferias", "roles", "cargos", "certifications"));

        // Aba Vinculos Contratais
        $this->loadModel("Escala.ClientGroupStaff");
        $this->loadModel("Cadastro.StaffContract");

        $options = array(
            'conditions' => array(
                'ClientGroupStaff.staff_id' => $id
            ),
            'contain' => array(
                'ClientGroup' => array(
                    'Client' => array(
                        'Contract' => array(
                            'Aircraft'
                        )
                    ),
                    'ClientGroupAircraft' => array(
                        'Aircraft'
                    )
                ),
            )
        );
        $cgs = $this->ClientGroupStaff->find("all", $options);

        $options = array(
            'conditions' => array(
                'StaffContract.staff_id' => $id
            ),
            'contain' => array(
                'Contract' => array(
                     'Aircraft'
                ),
            )
        );
        $sc = $this->StaffContract->find("all", $options);

        $this->set(compact("cgs", "sc"));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Staff->id = $id;
        if (!$this->Staff->exists()) {
            throw new NotFoundException(__('Invalid staff'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Staff->delete()) {
            $this->Session->setFlash(__('O tripulante foi removido.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class'  => 'alert-success',
            ));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o tripulante.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class'  => 'alert-warning',
            ));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
