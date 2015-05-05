<?php

class StaffCertificationsController extends CadastroAppController {

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->StaffCertification->create();

            $this->request->data['StaffCertification']['arq_morto'] = 0;
            
            if ($this->StaffCertification->save($this->request->data)) {

                // Atualiza os certificados antigos para arquivo morto
                $options = array(
                    'conditions' => array(
                        'StaffCertification.staff_id'               =>  $this->request->data['StaffCertification']['staff_id'],
                        'StaffCertification.certification_id'   =>  $this->request->data['StaffCertification']['certification_id'],
                        'StaffCertification.arq_morto'          => 0,
                        'StaffCertification.id !=' => $this->StaffCertification->getInsertID()
                    )
                );
                $certificados_antigos = $this->StaffCertification->find("all", $options);

                foreach($certificados_antigos as $sc) {
                    $this->StaffCertification->save(array(
                        'id' => $sc['StaffCertification']['id'],
                        'arq_morto' => 1
                    ));
                }

                $this->Session->setFlash(__('A certificação foi salva.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                
            } else {
                $this->Session->setFlash(__('A certificação não pôde ser salva. Confirme os dados do formulário.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }

            return $this->redirect(array('controller' => 'staffs', 'action' => 'edit', $this->request->data["StaffCertification"]["staff_id"], '#' => 'treinamento'));
        }
    }

}
