<?php
class StaffGradesController extends CadastroAppController {
	public $uses = array("Cadastro.StaffGrade", "Cadastro.Aircraft", "Cadastro.Contract", "Cadastro.Staff");

	// ajax para desescalar
	public function ajax_delete_grade() {
		// action ajax
		$this->layout = "ajax";
		$this->autoRender = false;

		$staff_id = $this->request->data["staff_id"];
		$staff_grade_id = $this->request->data["staff_grade_id"];
		$staff_grade_contract_id = $this->request->data["staff_grade_contract_id"];

		$this->StaffGrade->delete($staff_grade_id);
		$this->StaffGrade->StaffGradeContract->delete($staff_grade_contract_id);

		$staff_grade = $this->StaffGrade->find("first", array("conditions" => array("StaffGrade.id" => $staff_grade_id) ) );

		if(!empty($staff_grade)) {
			if($staff_grade["StaffGrade"]["type"] == 2) {

				$this->StaffGrade->delete($staff_grade_id - 1);
				$this->StaffGrade->delete($staff_grade_id);
			}
		}
		
		$staff = $this->Staff->find("first", array(
			"conditions" => array(
				"Staff.id" => $staff_id
			)
		) );

		// retorno
		$retorno = array(
			"status" => "success",
			"message" => "O tripulante {$staff['Staff']['name']} foi desescalado.",
			"id" => false
		);

		echo json_encode($retorno);
		die();
	}

	public function view_by_aircraft() {
		$this->uses = array("AircraftModel", "StaffGrade");

		$aircrafts = $this->AircraftModel->find("list");

		$months = array(
			1 => "Janeiro",
			2 => "Fevereiro",
			3 => "Março",
			4 => "Abril",
			5 => "Maio",
			6 => "Junho",
			7 => "Julho",
			8 => "Agosto",
			9 => "Setembro",
			10 => "Outubro",
			11 => "Novembro",
			12 => "Dezembro",
		);

		$years = range(date('Y') + 25, date('Y') - 25);

		$this->set(compact("months", "years"));

		if($this->request->is("post")) {
			$staff_grades = $this->StaffGrade->find("all", array(
				"conditions" => array(
					"OR" => array(
						"MONTH(StaffGrade.date_start) >=" => $this->request->data["StaffGrade"]["month"],
						"MONTH(StaffGrade.date_finish) >=" => $this->request->data["StaffGrade"]["month"],
						"YEAR(StaffGrade.date_start) >=" => $this->request->data["StaffGrade"]["year"],
						"YEAR(StaffGrade.date_finish) >=" => $this->request->data["StaffGrade"]["year"],
					)
				),
				"contain" => array(
					"Staff",
					"StaffGradeContract" => array(
						"fields" => array("StaffGradeContract.id"),
						"Contract" => array(
							"fields" => array("Contract.id"),
							"ContractBasis" => array(
								"Basis"
							),
							"Aircraft"
						)
					)
				)
			) );

		}

		$this->set(compact("aircrafts", "staff_grades"));
	}

	public function view_by_staff() {
		$this->uses = array("AircraftModel", "StaffGrade");

		$aircrafts = $this->AircraftModel->find("list");

		$months = array(
			1 => "Janeiro",
			2 => "Fevereiro",
			3 => "Março",
			4 => "Abril",
			5 => "Maio",
			6 => "Junho",
			7 => "Julho",
			8 => "Agosto",
			9 => "Setembro",
			10 => "Outubro",
			11 => "Novembro",
			12 => "Dezembro",
		);

		$years = range(date('Y') + 25, date('Y') - 25);

		$this->set(compact("months", "years"));

		if($this->request->is("post")) {
			$staff_grades = $this->StaffGrade->find("all", array(
				"conditions" => array(
					"OR" => array(
						"MONTH(StaffGrade.date_start) >=" => $this->request->data["StaffGrade"]["month"],
						"MONTH(StaffGrade.date_finish) >=" => $this->request->data["StaffGrade"]["month"],
						"YEAR(StaffGrade.date_start) >=" => $this->request->data["StaffGrade"]["year"],
						"YEAR(StaffGrade.date_finish) >=" => $this->request->data["StaffGrade"]["year"],
					)
				),
				"contain" => array(
					"Staff",
					"StaffGradeContract" => array(
						"fields" => array("StaffGradeContract.id"),
						"Contract" => array(
							"fields" => array("Contract.id"),
							"ContractBasis" => array(
								"Basis"
							),
							"Aircraft"
						)
					)
				)
			) );

		}

		$this->set(compact("aircrafts", "staff_grades"));
	}

	public function view() {

	}

	// ajax para salvar a escala
	public function ajax_add_grade() {
		// action ajax
		$this->layout = "ajax";
		$this->autoRender = false;

		// recebe os dados
		$staff_id = $this->request->data["staff_id"];
		$aircraft_id = $this->request->data["aircraft_id"];
		$role = $this->request->data["role"];
		$date_start = $this->request->data["date_start"];
		$date_finish = $this->request->data["date_finish"];
		$type = $this->request->data["type"];

		// se for escala
		if( (int) $type == 2) {
			$datetime = new DateTime( $this->StaffGrade->parseDate($date_start, "Y-m-d") );

			$datetime->add(new DateInterval('P1D'));

			$date_start = $datetime->format("Y-m-d");
		}

		// limpa o model de staff_grade
		$this->StaffGrade->create();

		// salva a nova staff_grade
		$dados = array(
			"staff_id" => $staff_id,
			"type" => $type,
			"date_start" => $this->StaffGrade->parseDate($date_start, "Y-m-d"),
			"date_finish" => $this->StaffGrade->parseDate($date_finish, "Y-m-d")
		);

		// verifica se o tripulante já tem esta grade
		$exists = $this->StaffGrade->find("first", array(
			"conditions" => array(
				"staff_id" => $staff_id,
				"type" => $type,
				"date_start" => $this->StaffGrade->parseDate($date_start, "Y-m-d"),
				"date_finish" => $this->StaffGrade->parseDate($date_finish, "Y-m-d")
			)
		) );

		// se ele não tem esta grade, ela é salva
		if(empty($exists)) {
			$this->StaffGrade->save($dados);

			// se for escala
			if( (int) $type == 2) {
				// cria a grade de apresentação
				$this->StaffGrade->create();

				$this->StaffGrade->save( array(
					"staff_id" => $staff_id,
					"type" => 1,
					"date_start" => $this->StaffGrade->parseDate($this->request->data["date_start"], "Y-m-d"),
					"date_finish" => $this->StaffGrade->parseDate($this->request->data["date_finish"], "Y-m-d"),
				) );
			}

			// armazena o id da nova staff_grade
			$staff_grade_id = $this->StaffGrade->getInsertID();

			if( (int) $type == 2) {
				$staff_grade_id = $staff_grade_id - 1;
			}

		} else {
			if( (int) $exists["StaffGrade"]["type"] == 2) {
				$staff_grade_id = (int) $exists["StaffGrade"]["id"] - 1;
			} else {
				$staff_grade_id = (int) $exists["StaffGrade"]["id"];
			}
		}

		// limpa o model de staff_grade_contract
		$this->StaffGrade->StaffGradeContract->create();

		// busca o contrato da aeronave selecionada
		$contract = $this->Contract->find("first", array(
			"conditions" => array(
				"Contract.aircraft_id" => $aircraft_id
			),
			"order" => array(
				"Contract.id DESC"
			)
		) );

		// salva o staff_grade_contract
		$dados = array(
			"staff_grade_id" => $staff_grade_id,
			"contract_id" => $contract["Contract"]["id"],
			"role" => $role
		);

		// verifica se ja não foi escalado
		$exists = $this->StaffGrade->StaffGradeContract->find("first", array(
			"conditions" => $dados
		) );

		// busca o tripulante
		$staff = $this->Staff->find("first", array(
			"conditions" => array(
				"Staff.id" => $staff_id
			)
		) );

		if(empty($exists)) {
			$this->StaffGrade->StaffGradeContract->create();
			$this->StaffGrade->StaffGradeContract->save($dados);

			// armazena o id da nova staff_grade_contract
			$staff_grade_contract_id = $this->StaffGrade->StaffGradeContract->getInsertID();

			// salva os alertas do tripulante
			$staffs = $this->Session->read("staffs");

			foreach($staffs as $k => $s) {
				if($s["Staff"]["id"] == $staff_id) {

					foreach($s["Staff"]["alerts"] as $a) {
						$this->StaffGrade->StaffGradeAlert->create();

						$this->StaffGrade->StaffGradeAlert->save( array(
							"staff_grade_id" => $staff_grade_id,
							"validate" => $a["validate"],
							"message" => $a["message"],
							"color" => $a["color"],
							"priority" => $a["priority"],
							"status" => 0,
						) );
					}
				}
			}

			// retorno
			$retorno = array(
				"status" => "success",
				"message" => "O tripulante {$staff['Staff']['name']} foi adicionado a escala #{$contract['Contract']['id']}.",
				"id" => array(
					"staff_grade_id" => $staff_grade_id,
					"staff_grade_contract_id" => $staff_grade_contract_id,
					"staff_id" => $staff_id
				)
			);
		} else {

			// retorno
			$retorno = array(
				"status" => "danger",
				"message" => "O tripulante {$staff['Staff']['name']} já está escalado.",
				"id" => false
			);
		}

		echo json_encode($retorno);
		die();
	}

	// ajax para validar os tripulantes para a escala
	public function ajax_verify_by_aircraft() {
		$this->layout = "ajax";
		$this->autoRender = false;

		$aircraft_id = $this->request->data["aircraft_id"];
		$role = $this->request->data["role"];
		$date_start = $this->request->data["date_start"];
		$date_finish = $this->request->data["date_finish"];
		$type = $this->request->data["type"];

		// busca todos os contratos
		$contracts = $this->Contract->find("all", array(
			"conditions" => array(
				"Contract.aircraft_id" => $aircraft_id
			),
			"contain" => array(
				"ContractRequisition" => array(
					"conditions" => array(
						"ContractRequisition.role" => $role
					)
				)
			)
		) );

		$contract = $this->Contract->find("first", array(
			"conditions" => array(
				"Contract.aircraft_id" => $aircraft_id
			),
			"order" => array(
				"Contract.id DESC"
			),
			"fields" => array(
				"Contract.id",
				"Contract.aircraft_id",
				"Contract.name",
				"Contract.expire",
			),
			"contain" => array(
				"ContractRequisition" => array(
					"fields" => array(
						"ContractRequisition.id",
						"ContractRequisition.role",
						"ContractRequisition.flight_time",
						"ContractRequisition.commander_time",
						"ContractRequisition.motor_time",
						"ContractRequisition.similar_time",
						"ContractRequisition.ifr_time",
						"ContractRequisition.model_time",
						"ContractRequisition.size_time",
					),
					"ContractRequisitionTraining" => array(
						"fields" => array(
							"ContractRequisitionTraining.contract_requisition_id",
							"ContractRequisitionTraining.certification_id",
						),
						"Certification" => array(
							"fields" => array(
								"Certification.aircraft_model_id",
								"Certification.certification_type_id",
								"Certification.name",
							)
						)
					),
					"conditions" => array(
						"ContractRequisition.role" => $role
					)
				),
				"Aircraft" => array(
					"fields" => array(
						"Aircraft.id",
						"Aircraft.registration",
					),
					"AircraftModel" => array(
						"fields" => array(
							"AircraftModel.id",
							"AircraftModel.model",
							"AircraftModel.size",
							"AircraftModel.motor",
						),
					)
				)
			)
		) );

		$staff_licensed = array();

		$staff_licences = $this->Staff->StaffLicence->find("all", array(
			"conditions" => array(
				"StaffLicence.aircraft_model_id" => $contract["Aircraft"]["AircraftModel"]["id"]
			)
		) );

		foreach($staff_licences as $s) {
			$staff_licensed[] = $s["StaffLicence"]["staff_id"];
		}

		// busca todos os tripulantes
		$staffs = $this->Staff->find('all', array(
			'fields' => array(
				"Staff.id",
				"Staff.name",
			),
			'order' => array("Staff.name ASC"),
			'conditions' => array(
				"Staff.id" => $staff_licensed
			)
		) );

		$staffs_ids = array();

		foreach($staffs as $s) {
			$staffs_ids[] = $s["Staff"]["id"];
		}

		$all_flights = $this->Staff->StaffFlight->find("all", array(
			"fields" => array(
				"StaffFlight.id",
				"StaffFlight.staff_id",
				"StaffFlight.aircraft_model_id",
				"StaffFlight.fb",
				"StaffFlight.total",
				"StaffFlight.ifr",
			),
			"contain" => array(
				"AircraftModel" => array(
					"fields" => array(
						"AircraftModel.id",
						"AircraftModel.model",
						"AircraftModel.size",
						"AircraftModel.motor",
					)
				)
			),
			"conditions" => array(
				"StaffFlight.staff_id" => $staffs_ids
			)
		) );

		$staffs_disabled = array();

		foreach ($staffs as $i => $s) {

			$staffs[$i]["Staff"]["alerts"] = array();

			$conditions = array(
				"staff_id" => $s["Staff"]["id"],
				"type" => $type,
				"date_start" => $this->StaffGrade->parseDate($date_start, "Y-m-d"),
				"date_finish" => $this->StaffGrade->parseDate($date_finish, "Y-m-d"),
			);

			// verifica se ele já foi escalado
			$staff_grade = $this->StaffGrade->find("first", array(
				"conditions" => $conditions,
				"contain" => array(
					"StaffGradeContract"
				)
			) );

			$staffs[$i]["Staff"]["conditions"] = $conditions;

			// já foi escalado
			if(!empty($staff_grade)) {
				$staffs[$i]["Staff"]["staff_grade_id"] = $staff_grade["StaffGrade"]["id"];
				$staffs[$i]["Staff"]["staff_grade_contract_id"] = $staff_grade["StaffGradeContract"][0]["id"];
			}

			// inicializa o array de alertas
			$staffs[$i]["Staff"]["alerts"] = array();

			// verifica se já está escalado
			/*$isWithGrade = $this->Staff->isWithGrade($s["Staff"]["id"], $date_start, $date_finish);

			if( $isWithGrade ) {

				//if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {
					$staffs[$i]["Staff"]["alerts"][] = array(
						'validate' => 'isWithGrade',
						"message" => "O Tripulante " . $s['Staff']['name'] . " já estará escalado no período " . $isWithGrade['StaffGrade']['date_start'] . " até " . $isWithGrade['StaffGrade']['date_finish'],
						"color" => "#d1f1ff",
						"priority" => 7
					);

					$staffs_disabled[] = $s["Staff"]["id"];
				//}
			}

			// verifica se está de férias
			$isInVacation = $this->Staff->isInVacation($s["Staff"]["id"], $date_start, $date_finish);

			if( $isInVacation ) {

				//if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {
					$staffs[$i]["Staff"]["alerts"][] = array(
						'validate' => 'isInVacation',
						"message" => "O Tripulante " . $s['Staff']['name'] . " estará de férias do período " . $isInVacation['StaffGrade']['date_start'] . " até " . $isInVacation['StaffGrade']['date_finish'],
						"color" => "#d1f1ff",
						"priority" => 6
					);

					$staffs_disabled[] = $s["Staff"]["id"];
				//}
			}

			// verifica o último período de escala e conta a qtd em dias
			$lastGradeCount = $this->Staff->lastGradeCount($s["Staff"]["id"], $date_start);

			if( $lastGradeCount ) {

				//if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {
					$staffs[$i]["Staff"]["alerts"][] = array(
						'validate' => 'lastGradeCount',
						"message" =>  "O Tripulante " . $s['Staff']['name'] . " esteve/estará em escala do dia " . $lastGradeCount['StaffGrade']['date_start'] . " até o dia " . $lastGradeCount['StaffGrade']['date_finish'] . " e esta escala acontecerá em seu período de folga.",
						"color" => "#ffd1e0",
						"priority" => 5
					);

					$staffs_disabled[] = $s["Staff"]["id"];
				//}
			}
			*/
			// verifica se está com as habilitações em dia
			$licencesInDay = $this->Staff->licencesInDay($s["Staff"]["id"], $date_finish);

			if( $licencesInDay ) {

				//if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {

					$staffs[$i]["Staff"]["alerts"][] = array(
						'validate' => 'licencesInDay',
						"message" => "O Tripulante " . $s['Staff']['name'] . " possui as seguintes habilitações vencidas: $licencesInDay",
						"color" => "#ffd1d1",
						"priority" => 4
					);

					$staffs_disabled[] = $s["Staff"]["id"];
				//}
			}


			// verifica as horas de voo necessárias
			$checkFlightTime = $this->Staff->checkFlightTime($s["Staff"]["id"], $aircraft_id, $role, $date_finish, $all_flights, $contract);

			if($checkFlightTime) {
				$staffs[$i]["Staff"]["alerts"][] = array(
						'validate' => 'checkFlightTime',
						"message" => "O Tripulante " . $s['Staff']['name'] . " não atende as seguintes requisições contratuais:<br> $checkFlightTime.",
						"color" => "#ffd1d1",
						"priority" => 3
					);
			}

		}

		$this->Session->write('staffs', $staffs);

		echo json_encode($staffs);
		die();

	}

	public function add() {
		$staffs = $this->StaffGrade->Staff->find("list");
		
		$_aircrafts = $this->Aircraft->find("all", array(
			"contain" => array(
				"Contract"
			)
		) );
		
		$aircrafts = array();

		foreach($_aircrafts as $a) {
			if(!empty($a["Contract"])) {
				$aircrafts[$a["Aircraft"]["id"]] = $a["Aircraft"]["registration"];
			}
		}

		$types = $this->StaffGrade->findTypes();
		$roles = $this->StaffGrade->Staff->findRoles();

		$this->set(compact("staffs", "types", "aircrafts", "roles"));
	}

	public function add_external() {
		if ($this->request->is('post')) {
			$this->StaffGrade->create();
			if ($this->StaffGrade->save($this->request->data)) {
				$this->Session->setFlash(__('A grade foi salva.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				
			} else {
				$this->Session->setFlash(__('A grade não pôde ser salva. Confirme os dados do formulário.'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
			}

			return $this->redirect(array('controller' => 'staffs', 'action' => 'edit', $this->request->data["StaffGrade"]["staff_id"]));
		}
	}
}