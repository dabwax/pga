<?php

class Staff extends CadastroAppModel {

    public $hasMany = array(
        'Basis',
        'Cadastro.StaffRole',
        'Cadastro.StaffGrade',
        'Cadastro.StaffLicence',
        'Cadastro.StaffFlight',
        'Cadastro.StaffCertification',
        'Cadastro.StaffDesignation',
        'Cadastro.StaffHour',
        'Cadastro.StaffPeriod',
        'Cadastro.TrainingCertificationStaff',
        'Treinamento.TrainingCertificationStaff',
        'Treinamento.TrainingCertificationStaffPayment',
        'Escala.ScheduleGradeAircraftStaffDay',
    );

    public function beforeSave($options = array()) {

        if (!empty($this->data["Staff"]["expire_us"])) {
            $this->data["Staff"]["expire_us"] = $this->parseDate($this->data["Staff"]["expire_us"], 'Y-m-d');
        }
        if (!empty($this->data["Staff"]["expire_eu"])) {
            $this->data["Staff"]["expire_eu"] = $this->parseDate($this->data["Staff"]["expire_eu"], 'Y-m-d');
        }
        if (!empty($this->data["Staff"]["date_of_birth"])) {
            $this->data["Staff"]["date_of_birth"] = $this->parseDate($this->data["Staff"]["date_of_birth"], 'Y-m-d');
        }
        return true;
    }

    public function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['Staff']['expire_eu'])) {
                $results[$key]['Staff']['expire_eu'] = $this->parseDate($val['Staff']['expire_eu']);
            }
            if (isset($val['Staff']['expire_us'])) {
                $results[$key]['Staff']['expire_us'] = $this->parseDate($val['Staff']['expire_us']);
            }
            if (isset($val['Staff']['date_of_birth'])) {
                $results[$key]['Staff']['date_of_birth'] = $this->parseDate($val['Staff']['date_of_birth']);
            }
        }
        return $results;
    }

    public function gerarPagamentoDiarias($training_id = null) {

        // models
        $Training = ClassRegistry::init("Treinamento.Training");
        $TrainingCertification = ClassRegistry::init("Treinamento.TrainingCertification");
        $TrainingCertificationStaff = ClassRegistry::init("Treinamento.TrainingCertificationStaff");
        $TrainingCertificationStaffPayment = ClassRegistry::init("Treinamento.TrainingCertificationStaffPayment");
        $TrainingCertificationStaffSolo = ClassRegistry::init("Treinamento.TrainingCertificationStaffSolo");
        $TrainingCertificationStaffSimulator = ClassRegistry::init("Treinamento.TrainingCertificationStaffSimulator");
        $StaffPeriod = ClassRegistry::init('Cadastro.StaffPeriod');

        // busca todos dados deste treinamento
        $options = array(
            'conditions' => array(
                'Training.id' => $training_id
            ),
            'contain' => array(
                'TrainingCertification' => array(
                    'conditions' => array(
                        'TrainingCertification.type !=' => 'folga'
                    ),
                    'Certification',
                    'CertificationSupplier' => array('Country'),
                    'TrainingCertificationStaff',
                    'order' => array(
                        'TrainingCertification.date_finish ASC',
                    )
                ),
            )
        );
        $treinamento = $Training
                        ->find("first", $options);

        $pagamentos = array();

        // DIÁRIAS
        // 1) Verificar se é EU, US ou BR. Verifique vendo o país do endereço de qualquer um dos certificados cadastrados no curso.
        $currency = $Training
                        ->getCurrency($treinamento['TrainingCertification'][0]['CertificationSupplier']['country_id']);

        // recupera a taxa de diária
        $TrainingDaily = ClassRegistry::init("Treinamento.TrainingDaily");
        $td = $TrainingDaily
                ->find("first");

    // se for nacional
    if($currency == "BRL") {
        $tmp = "national";

        // SOLO
        if(in_array($treinamento['TrainingCertification'][0]['Certification']['certification_type_id'], array(1, 3, 4) )) {
            // Somar 0 dias
            $checkin_paid = 0;
            $checkout_paid = 0;
        // SIMULADOR
        } else if(in_array($treinamento['TrainingCertification'][0]['Certification']['certification_type_id'], array(2) )) {
            // Somar 2 dias
            $checkin_paid = 1;
            $checkout_paid = 1;
        }
    // se for internacional
    } else {
        $tmp = "international";

        // SOLO
        if(in_array($treinamento['TrainingCertification'][0]['Certification']['certification_type_id'], array(1, 3, 4) )) {
            // Somar 0 dias
            $checkin_paid = 0;
            $checkout_paid = 0;
        // SIMULADOR
        } else if(in_array($treinamento['TrainingCertification'][0]['Certification']['certification_type_id'], array(2) )) {
            // Somar 4 dias
            $checkin_paid = 2;
            $checkout_paid = 1;
        }
    }

        $treinamento['Instructor'] = $this->TrainingCertificationStaff->findInstrutoresInscritos($training_id);
        $treinamento['Student'] = $this->TrainingCertificationStaff->findTripulantesInscritos($training_id);
        $treinamento['Examiner'] = $this->TrainingCertificationStaff->findExaminadoresInscritos($training_id);

        foreach($treinamento['TrainingCertification'] as $tc) {
            foreach($tc['TrainingCertificationStaff'] as $tcs) {
                foreach($treinamento['Instructor'] as $x => $i) {
                     if($tcs['staff_id'] == $i['Staff']['id']) {
                        $treinamento['Instructor'][$x]['TrainingCertificationStaff']['date_start'] = $tcs['date_start'];
                        $treinamento['Instructor'][$x]['TrainingCertificationStaff']['date_finish'] = $tcs['date_finish'];
                     }
                }
                
                foreach($treinamento['Examiner'] as $x => $i) {
                     if($tcs['staff_id'] == $i['Staff']['id']) {
                        $treinamento['Examiner'][$x]['TrainingCertificationStaff']['date_start'] = $tcs['date_start'];
                        $treinamento['Examiner'][$x]['TrainingCertificationStaff']['date_finish'] = $tcs['date_finish'];
                     }
                }
                
                foreach($treinamento['Student'] as $x => $i) {
                     if($tcs['staff_id'] == $i['Staff']['id']) {
                        $treinamento['Student'][$x]['TrainingCertificationStaff']['date_start'] = $tcs['date_start'];
                        $treinamento['Student'][$x]['TrainingCertificationStaff']['date_finish'] = $tcs['date_finish'];
                     }
                }
            }
        }

        $instrutor_total = array();
        $instrutor_total_horas = array();

        $cargos = array("Instructor" => 2, "Student" => 1, "Examiner" => 3);

        foreach($cargos as $cargo_label => $cargo_id) {
            foreach($treinamento[$cargo_label] as $i) {

                $diff_total = 0;
                $alguma_aula_confirmada = false;

                foreach($i['TrainingCertificationStaff'] as $tcs) {
                    if(is_array($tcs)) {
                         $first_date = new DateTime($tcs['date_start']);
                         $last_date = new DateTime($tcs['date_finish']);

                        $diff = $first_date->diff($last_date)->days + 1;

                        $diff_total = $diff_total + $diff;
                    }
                }

                    $TrainingCertificationStaffPayment->create();

                    // gera os dados de pagamento
                    $payment = array(
                        'training_id'                       => $training_id,
                        'staff_id'                          => $i['Staff']['id'],
                        'type'                              => 'diarias',
                        'daily_value'                       => $td['TrainingDaily'][$tmp],
                        'daily_currency'                    => $currency,
                        'daily_total'                       => $diff_total * $td['TrainingDaily'][$tmp],
                        'daily_paid'                        => $diff_total,
                        'checkin_paid'                        => $checkin_paid,
                        'checkout_paid'                        => $checkout_paid,
                        'bonus'                             => 0,
                        // diária prevista
                        'status' => 3,
                        'discount' => 0,
                        'training_certification_type_id' => $cargo_id
                    );

                // se ele for um instrutor ou examinador
                if($cargo_id == 2 || $cargo_id == 3) {
                    // verificar se ele está escalado como tripulante também neste treinamento
                    $options = array(
                        'conditions' => array(
                            'TrainingCertificationStaff.training_id' => $training_id,
                            'TrainingCertificationStaff.staff_id' => $i['Staff']['id'],
                            'TrainingCertificationStaff.training_certification_type_id' => 1,
                        )
                    );
                    $count = $this->TrainingCertificationStaff->find("count", $options);

                    if($count > 0) {
                        $payment['daily_paid'] = 0;
                        $payment['daily_total'] = 0;
                    }
                }

                // Salva o pagamento de diária
                $TrainingCertificationStaffPayment
                    ->save($payment);

            }
        }

        // gera notificação
        $oNotification = ClassRegistry::init("Notification");
        $oNotification->insertNotification(
            "Os pagamentos de diária do treinamento " . $treinamento['Training']['name'] . " foram gerados com sucesso.",
            Router::url(array('controller' => 'training_certification_staff_payments', 'action' => 'open_daily')),
            AuthComponent::user('id')
        );

        // FIM - Diárias
    }

    public function gerarPagamentoHoras($training_id = null) {
        // models
        $Training = ClassRegistry::init("Treinamento.Training");
        $TrainingCertification = ClassRegistry::init("Treinamento.TrainingCertification");
        $TrainingCertificationStaff = ClassRegistry::init("Treinamento.TrainingCertificationStaff");
        $TrainingCertificationStaffPayment = ClassRegistry::init("Treinamento.TrainingCertificationStaffPayment");
        $TrainingCertificationStaffSolo = ClassRegistry::init("Treinamento.TrainingCertificationStaffSolo");
        $TrainingCertificationStaffSimulator = ClassRegistry::init("Treinamento.TrainingCertificationStaffSimulator");
        $StaffPeriod = ClassRegistry::init('Cadastro.StaffPeriod');

        // busca todos dados deste treinamento
        $options = array(
            'conditions' => array(
                'Training.id' => $training_id
            ),
            'contain' => array(
                'TrainingCertification' => array(
                    'conditions' => array(
                        'TrainingCertification.type' => 'certificacao'
                    ),
                    'Certification',
                    'CertificationSupplier',
                    'TrainingCertificationStaff' => array(
                        "Staff",
                    ),
                    'order' => array(
                        'TrainingCertification.date_finish ASC',
                    )
                ),
            )
        );
        $treinamento = $Training
                        ->find("first", $options);
        $staffs = $TrainingCertificationStaff
                    ->findTripulantesInscritos($training_id);

        // Horas
        // Itera cada aula
        foreach($treinamento['TrainingCertification'] as $a) {

            // 1) Verificar o tipo, para saber se é solo ou simulador.
            if( in_array( $a['Certification']['certification_type_id'], array(1, 3, 4) ) ) {

                foreach($staffs as $ts) :

                // SOLO
                // Verificar se é período de folga ou regular (1 = regular, 2 = folga)

                // Busca o último período do aluno para ver se é folga ou regular
                $options = array(
                    'conditions' => array(
                        'StaffPeriod.staff_id' => $ts['Staff']['id'],
                    ),
                    'order' => array(
                        'StaffPeriod.id DESC'
                    )
                );
                $ultimo_periodo = $StaffPeriod
                                    ->find("first", $options);

                // descobrir o valor da hora do cargo do tripulante
                $StaffRole = ClassRegistry::init('Cadastro.StaffRole');

                $options = array(
                    'conditions' => array(
                        'StaffRole.staff_id' => $ts['Staff']['id']
                    ),
                    'order' => array(
                        'StaffRole.id DESC'
                    ),
                    'contain' => array(
                        'Role'
                    )
                );
                $cargo = $StaffRole
                            ->find("first", $options);

                // Calcula o total multiplicando as horas da aula pelo valor/hora do cargo do Tripulante
                // Fórmula: =(QtyHrsTrein x VlrHrTrip) / 2
                $total = ($ts['hours'] * $cargo['Role']['training_hour']) / 2;

                $TrainingCertificationStaffSolo->create();

                // gera os dados de pagamento
                $payment = array(
                    'staff_id'                          => $ts['Staff']['id'],
                    'training_id'                       => $training_id,
                    'type'                              => 'horas',
                    'hour_value'                        => $cargo['Role']['training_hour'],
                    'hours'                             => $ts['hours'],
                    'total_paid'                        => $total,
                    'status'                            => 0,
                    'checked_1'                         => 0,
                    'checked_2'                         => 0,
                );

                // Salva o pagamento de diária
                $TrainingCertificationStaffSolo
                    ->save($payment);

                $oNotification = ClassRegistry::init("Notification");
                $oNotification->insertNotification(
                    "Os pagamentos de hora do tripulante " . $ts['Staff']['name'] . " no treinamento " . $treinamento['Training']['name'] . " foram gerados com sucesso.",
                    Router::url(array('controller' => 'training_certification_staff_payments', 'action' => 'open_hour')),
                    AuthComponent::user('id')
                );

                endforeach;

            } elseif ( $a['Certification']['certification_type_id'] == 2) {
                // SIMULADOR

                foreach($staffs as $ts) :

                    // Calcula o total multiplicando as horas da aula pelo valor/hora do cargo do Tripulante
                    // Fórmula: =(QtyHrsTrein x VlrHrTrip)
                    $total = ($ts['hours'] * $cargo['Role']['training_hour']);

                    $TrainingCertificationStaffSimulator->create();

                    // gera os dados de pagamento
                    $payment = array(
                        'staff_id'                          => $ts['Staff']['id'],
                        'training_id'                       => $training_id,
                        'type'                              => 'horas',
                        'hour_value'                        => $cargo['Role']['training_hour'],
                        'hours'                             => $ts['hours'],
                        'total_paid'                        => $total,
                        'status'                            => 0,
                        'checked_1'                         => 0,
                        'checked_2'                         => 0,
                    );

                    // Salva o pagamento de diária
                    $TrainingCertificationStaffSimulator
                        ->save($payment);

                        $oNotification = ClassRegistry::init("Notification");
                        $oNotification->insertNotification(
                            "Os pagamentos de hora do tripulante " . $ts['Staff']['name'] . " no treinamento " . $treinamento['Training']['name'] . " foram gerados com sucesso.",
                            Router::url(array('controller' => 'training_certification_staff_payments', 'action' => 'open_hour')),
                            AuthComponent::user('id')
                        );

                endforeach;
            }
        }
    }

/**
 * MÉTODO DE VALIDAÇÃO DOS ALERTAS.
 */
    public function validarAlertasTripulante($training_staff, $staff) {
        $alerts = array();

        $oTraining = ClassRegistry::init('Treinamento.Training');

        $options = array(
            'conditions' => array(
                'Training.id' => $training_staff['training_id'],
            ),
        );
        $training    = $oTraining->find("first", $options);
        $date_start  = $training['Training']['date_start'];
        $date_finish = $training['Training']['date_finish'];


        // verifica se ele possui os pré-requisitos

        // busca todos os certificados dele
        $options = array(
            'conditions' => array(
                'StaffCertification.staff_id' => $staff['id']
            )
        );
        $staff_certifications = $this->StaffCertification->find("all", $options);

        // busca todos pre-requisitos
        $options = array(
            'conditions' => array(
                'TrainingCertification.training_id' => $training_staff['training_id']
            ),
            'contain' => array(
                'Certification' => array(
                    'CertificationGroup'
                )
            )
        );
        $aulas = $oTraining->TrainingCertification->find("all", $options);

        // grupos que pertencem a este treinamento
        $groups = array();

        // itera todas as aulas
        foreach($aulas as $pr) {
            if(!empty($pr['Certification']['CertificationGroup'])) {
            foreach($pr['Certification']['CertificationGroup'] as $cg) {
                    $id = $cg['id'];

                    // se não existir o grupo no array de $groups
                    if(!in_array($id, $groups)) {
                        // inclui ele no array
                        $groups[] = $id;
                    }
                }
            }
        }

        // busca agora todos os grupos baseado nos ids salvos acima
        $oCertificationGroup = ClassRegistry::init('Treinamento.CertificationGroup');

        // array de tipos a buscar, 1 por padrão (tripulante)
        $types = array(1);

        // se a aula for do tipo instrutor, inclui no array de tipos
        if($training_staff['training_certification_type_id'] == 2) {
            $types[] = 2;
        }

        // se a aula for do tipo examinador, inclui no array de tipos
        if($training_staff['training_certification_type_id'] == 3) {
            $types[] = 3;
        }

        $options = array(
            'conditions' => array(
                'CertificationGroup.id' => $groups,
                'CertificationGroup.certification_id' => $training_staff['TrainingCertification']['certification_id'],
                'CertificationGroup.training_certification_type_id' => $types
            ),
            'contain' => array(
                'Certification'
            )
        );
        $groups = $oCertificationGroup->find("all", $options);

        // filtra os certificados dos grupos
        $groups = $oCertificationGroup->filterCertifications($groups);

        $oStaffCertification = ClassRegistry::init('Cadastro.StaffCertification');

        if(!empty($groups)) :
        // itera cada grupo - é hora de verificarmos se ele possui algum destess certificados válido
        foreach($groups as $i_g => $g) {
            // itera os certificados do grupo
            foreach($g['Certification'] as $i_c => $c) {
                // busca na tabela de certificações do tripulante, se ele possui alguma certificação para este certificado
                $options = array(
                    'conditions' => array(
                        'StaffCertification.certification_id' => $c['id']
                    )
                );
                $find = $oStaffCertification->find("all", $options);

                // ele possui esta certificação
                if(!empty($find)) {
                    // itera cada certificação que ele possui deste certificado
                    foreach($find as $sc) {
                        // cria um obj de DateTime para verificar se a data de finalização desta certificação foi no período de 6 meses
                        $oDateFinish = new DateTime($sc['StaffCertification']['date_finish']);

                        // cria um obj de DateTime da data inicial da aula
                        $oDateNow = DateTime::createFromFormat("d/m/Y", $training_staff['TrainingCertification']['date_start']);

                        $diff = $oDateFinish->diff($oDateNow);

                        // se a qtd de meses na diferença de datas for menor ou igual a 6, está válida no período de 6 meses
                        if($diff->format('%m') <= 6) {
                            // torna o grupo do certificado válido
                            $g['Certification'][$i_c]['is_valid'] = true;
                            $groups[$i_g]['CertificationGroup']['is_valid'] = true;
                        } else {
                            $g['Certification'][$i_c]['is_valid'] = false;
                        }

                    }
                }
            }
        }

        // verifica se todos os grupos estão válidos
        $tmp_groups_ids = array();
        $tmp_valid_groups_ids = array();

        foreach($groups as $g) {
            $tmp_groups_ids[] = $g['CertificationGroup']['id'];

            if($g['CertificationGroup']['is_valid'] == true) {
                $tmp_valid_groups_ids[] = $g['CertificationGroup']['id'];
            }
        }

        // se os grupos existentes forem iguais aos grupos válidos
        if($tmp_groups_ids == $tmp_valid_groups_ids) {
            // o tripulante tem todos os grupos válidos
        } else {
            //  o tripulante tem algum grupo inválido
            $message = 'Este tripulante não possui os seguintes pré-requisitos válidos no período de 6 meses em relação a aula:';
            $grupos_invalidos = array_diff($tmp_groups_ids, $tmp_valid_groups_ids);

            // itera os grupos disponíveis para identificar os grupos inválidos
            foreach($groups as $g) {
                if(!in_array($g['CertificationGroup']['id'], $tmp_valid_groups_ids)) {

                    $message .= '<br>- ' . $g['CertificationGroup']['name'] . ' = ';

                    // itera os certificados deste grupo
                    foreach($g['Certification'] as $i_gc => $gc) {
                        // se for o último da lista
                        if($i_gc == $this->_lastKey($g['Certification'])) {
                            $message .= $gc['name'] . ';';
                        // se não for o último da lista
                        } else {
                            $message .= $gc['name'] . ', ';
                        }
                    }
                }
            }

            $alerts[] = array(
                'validate' => 'grupoInvalido',
                'message' => $message,
                'color' => '#d1f1ff',
                'priority' => 7,
                "training_certification_staff_id" => $training_staff['id'],
                "staff_id" => $staff['id'],
            );
        }
        endif; // fim - se houver $groups

        // verifica se já está escalado
        $isWithGrade = $this->isWithGrade($staff['id'], $date_start, $date_finish);

        if ($isWithGrade) {

            //if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {
            $alerts[] = array(
                'validate' => 'isWithGrade',
                "message"  => "O Tripulante " . $staff['name'] . " já estará escalado no período " . $isWithGrade['StaffGrade']['date_start'] . " até " . $isWithGrade['StaffGrade']['date_finish'],
                "color"    => "#d1f1ff",
                "priority" => 7,
                "training_certification_staff_id" => $training_staff['id'],
                "staff_id" => $staff['id'],
            );
            //}
        }

        // verifica se ele já está escalado em outro treinamento
        $inAnotherTraining = $this->inAnotherTraining($staff['id'], $date_start, $date_finish, $training_staff['training_id']);

        if ($inAnotherTraining) {

            //if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {
            $alerts[] = array(
                'validate' => 'inAnotherTraining',
                "message"  => "O Tripulante " . $staff['name'] . " já estará escalado em outro treinamento: " . implode(', ', $inAnotherTraining),
                "color"    => "#d1f1ff",
                "priority" => 7,
                "training_certification_staff_id" => $training_staff['id'],
                "staff_id" => $staff['id'],
            );
            //}
        }

        // verifica se está de férias
        $isInVacation = $this->isInVacation($staff['id'], $date_start, $date_finish);

        if ($isInVacation) {
            //if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {
            $alerts[] = array(
                'validate' => 'isInVacation',
                "message"  => "O Tripulante " . $staff['name'] . " estará de férias do período " . $isInVacation['StaffGrade']['date_start'] . " até " . $isInVacation['StaffGrade']['date_finish'],
                "color"    => "#d1f1ff",
                "priority" => 6,
                "training_certification_staff_id" => $training_staff['id'],
                "staff_id" => $staff['id'],
            );
            //}
        }

        // verifica o último período de escala e conta a qtd em dias
        $lastGradeCount = $this->lastGradeCount($staff['id'], $date_start);

        if ($lastGradeCount) {

            //if( !isset($staffs_disabled[$s["Staff"]["id"]] ) ) {
            $alerts[] = array(
                'validate' => 'lastGradeCount',
                "message"  => "O Tripulante " . $staff['name'] . " esteve/estará em escala do dia " . $lastGradeCount['StaffGrade']['date_start'] . " até o dia " . $lastGradeCount['StaffGrade']['date_finish'] . " e esta escala acontecerá em seu período de folga.",
                "color"    => "#ffd1e0",
                "priority" => 5,
                "training_certification_staff_id" => $training_staff['id'],
                "staff_id" => $staff['id'],
            );
            //}
        }

        // verifica se está com as habilitações que tem em dia
        if($training_staff['TrainingCertification']['Certification']['aircraft_model_id'] != null) {

            $licencesInDay = $this->licencesInDay($staff['id'], $date_finish, $training_staff['TrainingCertification']['Certification']['aircraft_model_id']);

            if ($licencesInDay) {

                $alerts[] = array(
                'validate' => 'licencesInDay',
                "message"  => "O Tripulante " . $staff['name'] . " possui as seguintes condições de habilitação: <ul>$licencesInDay</ul>",
                "color"    => "#ffd1d1",
                "priority" => 4,
                "training_certification_staff_id" => $training_staff['id'],
                "staff_id" => $staff['id'],
                );
            }
        }

        // verifica se está com as designações em dia
        if($training_staff['TrainingCertification']['Certification']['aircraft_model_id'] != null) {

            // examinador
            if(!empty($training_staff["TrainingCertificationStaff"]["training_certification_type_id"]) && $training_staff["TrainingCertificationStaff"]["training_certification_type_id"] == 3) {

                $designationsInDayExaminador = $this->designationsInDayExaminador($staff['id'], $date_finish, $training_staff['TrainingCertification']['Certification']['aircraft_model_id']);

                if ($designationsInDayExaminador) {

                    $alerts[] = array(
                    'validate' => 'designationsInDayExaminador',
                    "message"  => "O Tripulante " . $staff['name'] . " possui as seguintes restrições para designação de examinador: <ul>$designationsInDayExaminador</ul>",
                    "color"    => "#ffd1d1",
                    "priority" => 4,
                    "training_certification_staff_id" => $training_staff['id'],
                    "staff_id" => $staff['id'],
                    );
                }

            // instrutor
            } else if(!empty($training_staff["TrainingCertificationStaff"]["training_certification_type_id"]) && $training_staff["TrainingCertificationStaff"]["training_certification_type_id"] == 2)  {

                $designationsInDayInstrutor = $this->designationsInDayInstrutor($staff['id'], $date_finish, $training_staff['TrainingCertification']['Certification']['aircraft_model_id'], $training_staff['TrainingCertification']['Certification']['certification_type_id']);

                if ($designationsInDayInstrutor) {

                    $alerts[] = array(
                    'validate' => 'designationsInDayInstrutor',
                    "message"  => "O Tripulante " . $staff['name'] . " possui as seguintes restrições para designação de instrutor:<ul>" . $designationsInDayInstrutor['message'] . "</ul>",
                    "color"    => "#ffd1d1",
                    "priority" => 4,
                    "training_certification_staff_id" => $training_staff['id'],
                    "staff_id" => $staff['id'],
                    );
                }

            // tripulante
            } else {

                $designationsInDay = $this->designationsInDay($staff['id'], $date_finish, $training_staff['TrainingCertification']['Certification']['aircraft_model_id']);

                if ($designationsInDay) {

                    $alerts[] = array(
                    'validate' => 'designationsInDay',
                    "message"  => "O Tripulante " . $staff['name'] . " possui as seguintes condições de designação: <ul>$designationsInDay</ul>",
                    "color"    => "#ffd1d1",
                    "priority" => 4,
                    "training_certification_staff_id" => $training_staff['id'],
                    "staff_id" => $staff['id'],
                    );
                }
            }
        }

        return $alerts;
    }

    public function inAnotherTraining($staff_id, $date_start, $date_finish, $training_id) {
        $oTraining = ClassRegistry::init("Treinamento.Training");
        
        if(!empty($date_start) && !empty($date_finish)) {
            $oDateStart = DateTime::createFromFormat("d/m/Y", $date_start);
            $oDateFinish = DateTime::createFromFormat("d/m/Y", $date_finish);
            $training_certification_ids = array();

            // buscar todos treinamentos nessa época
            $options = array(
                'conditions' => array(
                    'AND' => array(
                        'Training.date_start >=' => $oDateStart->format("Y-m-d"),
                        'Training.date_finish <=' => $oDateFinish->format("Y-m-d"),
                    )
                ),
                'contain' => array(
                    'TrainingCertification'
                )
            );
            $trainings = $oTraining->find("all", $options);

            foreach($trainings as $t) {
                foreach($t['TrainingCertification'] as $tc) {
                    if($tc['id'] != $training_id) {
                        $training_certification_ids[] = $tc['id'];
                    }
                }
            }

            // busca se tem algum registro deste tripulante em alguma dessas aulas
            $options = array(
                'conditions' => array(
                    'TrainingCertificationStaff.training_certification_id' => $training_certification_ids,
                    'TrainingCertificationStaff.staff_id' => $staff_id,
                    'TrainingCertificationStaff.training_id !=' => $training_id,
                ),
                'contain' => array(
                    'Training'
                )
            );

            $aulas = $this->TrainingCertificationStaff->find("all", $options);

            $tmp = array();

            foreach($aulas as $a) {
                $tmp[] = $a['Training']['name'];
            }

            if(!empty($aulas)) {
                return $tmp;
            } else {
                return false;
            }
        }
    }

    private function _lastKey($array) {
        end($array);
        return key($array);
    }

    // apenas para armazenar os cargos oficiais
    // dificilmente isso aqui irá mudar
    public function findRoles() {
        return array(
            1 => "Comandante",
            2 => "Co-piloto",
            3 => "Comissário",
        );
    }

    // método de validação - se o tripulante está de férias
    // 5 - férias
    public function isInVacation($staff_id, $date_start, $date_finish) {
        $this->id = $staff_id;

        $last_vacation = $this->StaffGrade->find("first", array(
            "order"      => array(
                "StaffGrade.id DESC",
            ),
            "conditions" => array(
                "StaffGrade.type"     => 5,
                "StaffGrade.staff_id" => $staff_id,
            ),
        ));

        if (!empty($last_vacation)) {

            $a = new DateTime($this->parseDate($date_start, "Y-m-d"));
            $b = new DateTime($this->parseDate($date_finish, "Y-m-d"));
            $x = new DateTime($this->parseDate($last_vacation["StaffGrade"]["date_start"], "Y-m-d"));
            $y = new DateTime($this->parseDate($last_vacation["StaffGrade"]["date_finish"], "Y-m-d"));

            // re-transforma as datas
            $last_vacation["StaffGrade"]["date_start"]  = $this->parseDate($last_vacation["StaffGrade"]["date_start"], "d/m/Y");
            $last_vacation["StaffGrade"]["date_finish"] = $this->parseDate($last_vacation["StaffGrade"]["date_finish"], "d/m/Y");

            if (($x < $a && $y < $a) || ($x > $b && $y > $b)) {
                return false;
            } else {
                return $last_vacation;
            }

        }

        return false;
    }
    // método de validação - se o tripulante já estiver escalado no mesmo período
    public function isWithGrade($staff_id, $date_start, $date_finish) {
        $this->id = $staff_id;

        $grades = $this->StaffGrade->find("all", array(
            "order"      => array(
                "StaffGrade.id DESC",
            ),
            "conditions" => array(
                "StaffGrade.type"     => 2,
                "StaffGrade.staff_id" => $staff_id,
            ),
        ));

        if (!empty($grades)) {

            foreach ($grades as $g) {

                $daterange1 = array($this->parseDate($date_start, "Y-m-d"), $this->parseDate($date_finish, "Y-m-d"));
                $daterange2 = array($this->parseDate($g["StaffGrade"]["date_start"], "Y-m-d"), $this->parseDate($g["StaffGrade"]["date_finish"], "Y-m-d"));

                $range_min = new DateTime(min($daterange1));
                $range_max = new DateTime(max($daterange1));

                $start = new DateTime(min($daterange2));
                $end   = new DateTime(max($daterange2));

                if ($start >= $range_min && $end <= $range_max) {
                    $g["StaffGrade"]["date_start"]  = $this->parseDate($g["StaffGrade"]["date_start"], "d/m/Y");
                    $g["StaffGrade"]["date_finish"] = $this->parseDate($g["StaffGrade"]["date_finish"], "d/m/Y");

                    return $g;
                } else {
                    return false;
                }

            }
        }

        return false;
    }

    // método de validação - se o tripulante já repousou da última escala
    // 2 - escala
    public function lastGradeCount($staff_id, $date_start) {

        $last_grade = $this->StaffGrade->find("first", array(
            "order"      => array(
                "StaffGrade.id DESC",
            ),
            "conditions" => array(
                "StaffGrade.type"     => 2,
                "StaffGrade.staff_id" => $staff_id,
            ),
        ));

        if (!empty($last_grade)) {
            $o_date_start             = strtotime($this->parseDate($date_start, "Y-m-d"));
            $o_last_grade_date_finish = strtotime($this->parseDate($last_grade["StaffGrade"]["date_finish"], "Y-m-d"));
            $diff                     = $o_date_start - $o_last_grade_date_finish;

            // diferença da data inicial da próxima escala com a data final da última escala em dias
            //$diff = date("d", $diff);

            $o_last_grade_date_start = strtotime($this->parseDate($last_grade["StaffGrade"]["date_start"], "Y-m-d"));
            $diff_2                  = $o_last_grade_date_finish - $o_last_grade_date_start;

            // diferença da data final da última escala com a data inicial da última escala
            //$diff_2 = date("d", $diff_2);

            $result = $diff > ($diff_2 + 1 - 2);

            $last_grade["StaffGrade"]["diff"]        = $diff;
            $last_grade["StaffGrade"]["diff_2"]      = $diff_2;
            $last_grade["StaffGrade"]["result"]      = $result;
            $last_grade["StaffGrade"]["date_start"]  = $this->parseDate($last_grade["StaffGrade"]["date_start"], "d/m/Y");
            $last_grade["StaffGrade"]["date_finish"] = $this->parseDate($last_grade["StaffGrade"]["date_finish"], "d/m/Y");

            if ($o_date_start > $o_last_grade_date_finish) {
                return $last_grade;
            }
        }

        return false;
    }

    // método de validação - se o tripulante está com as habilitações em dia
    // 2 - escala
    public function licencesInDay($staff_id, $date_finish, $aircraft_model_id) {

        $licences = $this->StaffLicence->find("all", array(
            "conditions" => array(
                "StaffLicence.staff_id" => $staff_id,
                "StaffLicence.aircraft_model_id" => $aircraft_model_id
            ),
            "order" => array(
                "StaffLicence.expiration DESC"
            ),
            "limit" => 1
        ));

        $oAircraftModel = ClassRegistry::init('Cadastro.AircraftModel');

        $aircraft_model = $oAircraftModel->findById($aircraft_model_id);

        if (!empty($licences)) {

            $expired = array();

            $tem_habilitacao_valida = false;

            foreach ($licences as $l) {
                $date_expiration = new DateTime($this->parseDate($l["StaffLicence"]["expiration"], "Y-m-d"));
                $date_finish     = new DateTime($this->parseDate($date_finish, "Y-m-d"));

                if ($date_expiration <= $date_finish) {
                    // não-válido
                    $expired[] = $l;
                } else if($date_expiration >= $date_finish) {
                    // válido
                    $tem_habilitacao_valida = true;
                }
            }

            if (!empty($expired) && !$tem_habilitacao_valida) {
                $msg = "";

                if(!empty($aircraft_model['AircraftModel']['model'])) {
                    foreach ($expired as $e) {
                        $msg .= "<li>{$e['StaffLicence']['code']} (" . $aircraft_model['AircraftModel']['model'] . ") - vencida em {$e['StaffLicence']['expiration']};</li>";
                    }
                }

                return $msg;
            }
        } else {
            if(!empty($aircraft_model['AircraftModel']['model'])) {
                return "<li>Não possui habilitações para este modelo de aeronave (" . $aircraft_model['AircraftModel']['model'] . ")</li>";
            }
        }

        return false;
    }


    // método de validação - se o tripulante está com as designações em dia
    // 2 - escala
    public function designationsInDay($staff_id, $date_finish, $aircraft_model_id) {

        if(!empty($aircraft_model_id)) {
            $designations = $this->StaffDesignation->find("all", array(
                "conditions" => array(
                    "StaffDesignation.staff_id" => $staff_id,
                    "StaffDesignation.aircraft_model_id" => $aircraft_model_id
                ),
            ));

            $oAircraftModel = ClassRegistry::init('Cadastro.AircraftModel');

            $aircraft_model = $oAircraftModel->findById($aircraft_model_id);

            if (empty($designations)) {
                return "<li>Não possui designações para este modelo de aeronave (" . $aircraft_model['AircraftModel']['model'] . ")</li>";
            }
        }

        return false;
    }


    // método de validação - se o tripulante está com as designações em dia
    // 2 - escala
    public function designationsInDayExaminador($staff_id, $date_finish, $aircraft_model_id) {

        $designations = $this->StaffDesignation->find("all", array(
            "conditions" => array(
                "StaffDesignation.designation_id" => 18,
                "StaffDesignation.staff_id" => $staff_id,
                "StaffDesignation.aircraft_model_id" => $aircraft_model_id
            ),
        ));

        $oAircraftModel = ClassRegistry::init('Cadastro.AircraftModel');

        $aircraft_model = $oAircraftModel->findById($aircraft_model_id);

        if (empty($designations)) {
            if(!empty($aircraft_model['AircraftModel']['model'])) {
                return "<li>Não possui designações para este modelo de aeronave (" . $aircraft_model['AircraftModel']['model'] . ")</li>";
            } else {
                return false;
            }
        }

        return false;
    }


    // método de validação - se o tripulante está com as designações em dia
    // 2 - escala
    public function designationsInDayInstrutor($staff_id, $date_finish, $aircraft_model_id, $certification_type_id) {

        switch($certification_type_id) {
            // solo
            case 1:
                $type = "de Solo";
            // solo tic
            case 3:
                $type = "de Solo TIC";
            // solo tie
            case 4:
                $type = "de Solo TIE";
                $designations = array(15, 16, 17);
            break;
            // simulador
            case 2:
                $type = "de Simulador";
                $designations = array(17);
            break;
        }

        $designations = $this->StaffDesignation->find("all", array(
            "conditions" => array(
                "StaffDesignation.designation_id" => $designations,
                "StaffDesignation.staff_id" => $staff_id,
                "StaffDesignation.aircraft_model_id" => $aircraft_model_id
            ),
        ));

        $oAircraftModel = ClassRegistry::init('Cadastro.AircraftModel');

        $aircraft_model = $oAircraftModel->findById($aircraft_model_id);

        if(!empty( $aircraft_model['AircraftModel']['model'] )) {
            if (empty($designations)) {
                return array("type" => $type, "message" => "<li>Não possui designações para este modelo de aeronave (" . $aircraft_model['AircraftModel']['model'] . ")</li>");
            }
        }

        return false;
    }

    // método de validação - se o tripulante está com as horas de voo necessárias
    public function checkFlightTime($staff_id, $aircraft_id, $role, $date_finish, $flights, $contract) {

        App::import("Model", "Contract");
        $o_contract = new Contract();

        if (empty($contract["ContractRequisition"])) {
            $msg = "Esta matrícula não tem requisitos. Não será possível escalar";

            return $msg;
        }

        if (!empty($flights)) {

            // 1a verificacao - se tem as horas de voo totais do contrato
            $total = 0;

            foreach ($flights as $f) {
                if ($f["StaffFlight"]["staff_id"] == $staff_id) {
                    $total = $total + $f["StaffFlight"]["total"];
                }
            }

            if ($total <= $contract["ContractRequisition"][0]["flight_time"]) {
                $alerts[] = "Total de horas em vôo - <strong>Total exigido</strong>: {$contract['ContractRequisition'][0]['flight_time']} horas / <strong>Total do tripulante</strong>: {$total} horas";
            }

            // 2a verificacao - se tem as horas de voo como comandante do contrato
            $total = 0;

            foreach ($flights as $f) {

                if ($f["StaffFlight"]["staff_id"] == $staff_id) {

                    if ($f["StaffFlight"]["fb"] == "1P" || $f["StaffFlight"]["fb"] == "DC" || $f["StaffFlight"]["fb"] == "IN") {
                        $total = $total + $f["StaffFlight"]["total"];
                    }

                }
            }

            if ($total <= $contract["ContractRequisition"][0]["commander_time"]) {
                $alerts[] = "Total de horas como comandante - Total exigido: {$contract['ContractRequisition'][0]['commander_time']} horas / <strong>Total do tripulante</strong>: {$total} horas";
            }

            // 3a verificacao - se tem as horas de voo como comandante para aquele tipo do motor do contrato
            $total = 0;

            foreach ($flights as $f) {

                if ($f["StaffFlight"]["staff_id"] == $staff_id) {

                    if ($f["StaffFlight"]["fb"] == "1P" || $f["StaffFlight"]["fb"] == "DC" || $f["StaffFlight"]["fb"] == "IN") {
                        if ($f["AircraftModel"]["motor"] == $contract['Aircraft']['AircraftModel']['motor']) {
                            $total = $total + $f["StaffFlight"]["total"];
                        }
                    }
                }
            }

            if ($total <= $contract["ContractRequisition"][0]["commander_time"]) {
                $alerts[] = "Total de horas como comandante para o tipo de motor - Total exigido: {$contract['ContractRequisition'][0]['motor_time']} horas / <strong>Total do tripulante</strong>: {$total} horas";
            }

            // 6a verificacao - se tem as horas de voo como comandante para aquele modelo do contrato
            $aircraft_model_contract = $contract["Aircraft"]["AircraftModel"]["id"];
            $total                   = 0;

            foreach ($flights as $f) {

                if ($f["StaffFlight"]["staff_id"] == $staff_id) {

                    if ($f["StaffFlight"]["aircraft_model_id"] == $aircraft_model_contract) {
                        if ($f["StaffFlight"]["fb"] == "1P" || $f["StaffFlight"]["fb"] == "DC" || $f["StaffFlight"]["fb"] == "IN") {
                            $total = $total + $f["StaffFlight"]["total"];
                        }
                    }

                }
            }

            if ($total <= $contract["ContractRequisition"][0]["ifr_time"]) {
                $alerts[] = "Total de horas em vôo como comandante para modelo exato - <strong>Total exigido</strong>: {$contract['ContractRequisition'][0]['model_time']} horas / <strong>Total do tripulante</strong>: {$total} horas";
            }

            $total_model = $total;

            // 4a verificacao - se tem as horas de voo em modelos similares ao modelo do contrato
            $similars = $o_contract->Aircraft->AircraftModel->AircraftSimilar->find("all", array(
                "conditions" => array(
                    "AircraftSimilar.aircraft_model_id" => $aircraft_model_contract,
                ),
                "contain"    => array(
                    "AircraftModel" => array(
                        "StaffFlight" => array(
                            "conditions" => array(
                                "StaffFlight.staff_id"          => $staff_id,
                                "StaffFlight.aircraft_model_id" => $aircraft_model_contract,
                            ),
                        ),
                    ),
                ),
            ));

            $total = 0;

            foreach ($similars as $s) {
                foreach ($s["AircraftModel"]["StaffFlight"] as $f) {
                    $total = $total + $f["total"];
                }
            }

            $total = $total + $total_model;

            if ($total <= $contract["ContractRequisition"][0]["similar_time"]) {
                $alerts[] = "Total de horas com modelo similar - Total exigido: {$contract['ContractRequisition'][0]['similar_time']} horas / <strong>Total do tripulante</strong>: {$total} horas";
            }

            // 5a verificacao - se tem as horas de voo totais em IFR do contrato
            $total = 0;

            foreach ($flights as $f) {

                if ($f["StaffFlight"]["staff_id"] == $staff_id) {
                    $total = $total + $f["StaffFlight"]["ifr"];
                }

            }

            if ($total <= $contract["ContractRequisition"][0]["ifr_time"]) {
                $alerts[] = "Total de horas em vôo em IFR - Total exigido: {$contract['ContractRequisition'][0]['ifr_time']} horas / <strong>Total do tripulante</strong>: {$total} horas";
            }

            // 7a verificacao - se tem as horas de voo para modelos com o mesmo porte do modelo do contrato
            $total = 0;

            foreach ($flights as $f) {

                if ($f["StaffFlight"]["staff_id"] == $staff_id) {

                    if ($f["AircraftModel"]["size"] == $contract["Aircraft"]["AircraftModel"]["size"]) {
                        $total = $total + $f["StaffFlight"]["total"];
                    }

                }

            }

            if ($total <= $contract["ContractRequisition"][0]["ifr_time"]) {
                $alerts[] = "Total de horas em vôo para modelos com o mesmo porte do modelo do contrato - <strong>Total exigido</strong>: {$contract['ContractRequisition'][0]['size_time']} horas / <strong>Total do tripulante</strong>: {$total} horas";
            }

            // 8a verificacao - se tem treinamentos e se eles não expiraram
            $certifications = $this->StaffCertification->find("all", array(
                "fields"     => array(
                    "StaffCertification.certification_id",
                    "StaffCertification.expire",
                ),
                "conditions" => array(
                    "StaffCertification.staff_id" => $staff_id,
                ),
            ));

            $required         = array();
            $required_extenso = array();
            $valid            = array();
            $expired          = array();

            foreach ($contract["ContractRequisition"] as $r) {
                foreach ($r["ContractRequisitionTraining"] as $t) {

                    if (!array_key_exists($t["certification_id"], $required_extenso)) {
                        $required_extenso[$t["certification_id"]] = $t["Certification"];
                    }

                    if (!in_array($t["certification_id"], $required)) {
                        $required[] = $t["certification_id"];
                    }

                    foreach ($certifications as $c) {
                        if ($t["certification_id"] == $c["StaffCertification"]["certification_id"]) {

                            $date_date_finish         = new DateTime($this->parseDate($date_finish, "Y-m-d"));
                            $date_staff_certification = new DateTime($this->parseDate($c["StaffCertification"]["expire"], "Y-m-d"));

                            if ($date_staff_certification > $date_date_finish) {

                                if (!in_array($c["StaffCertification"]["certification_id"], $valid)) {
                                    $valid[] = $c["StaffCertification"]["certification_id"];
                                }
                            } else {
                                if (!array_key_exists($c["StaffCertification"]["certification_id"], $expired)) {
                                    $expired[$c["StaffCertification"]["certification_id"]] = $c["StaffCertification"]["expire"];
                                }
                            }

                        }
                    }

                }
            }

            if ($required != $valid) {

                foreach ($required as $r) {
                    if (!in_array($r, $valid)) {
                        $alerts[] = "<strong>Treinamento {$required_extenso[$r]['name']}</strong> - não possui";
                    }

                    if (in_array($r, $expired)) {
                        $alerts[] = "<strong>Treinamento {$required_extenso[$r]['name']}</strong> - vencida em $expired[$r]";
                    }
                }
            }

            if (!empty($alerts)) {
                $msg = implode($alerts, "<br />");

                return $msg;
            }
        }

        return false;
    }

    public function saveQuinzena($id, $quinzena) {

        $save = $this->StaffPeriod->save(array(
            'staff_id' => $id,
            'period'   => $quinzena,
        ));

        return $save;
    }

}