<?php

class ChartsController extends AdminAppController {
    public $uses = array("Admin.Chart", "ChartStudentInput");

    public function view($chart_id = null) {
        $this->loadModel("StudentInputValue");

        $chart_config = $this->StudentInputValue->formatToChart($chart_id);

        $this->set(compact('chart_config'));
    }

    public function add_input($id = null) {
        if($this->request->is('post')) {

            $this->Chart->ChartStudentInput->create();
            $this->Chart->ChartStudentInput->save(array(
                'chart_id' => $this->request->data['ChartStudentInput']['chart_id'],
                'student_input_id' => $this->request->data['ChartStudentInput']['student_input_id'],
            ));

            $this->Session->setFlash(__('O input foi adicionado ao gráfico.'));

            return $this->redirect( array('controller' => 'charts', 'action' => 'edit', $this->request->data['ChartStudentInput']['chart_id'], '#' => 'grafico-' . $this->request->data['ChartStudentInput']['chart_id']) );
        } else {
            return $this->redirect( array('controller' => 'charts', 'action' => 'edit', $this->request->data['ChartStudentInput']['chart_id'], '#' => 'grafico-' . $this->request->data['ChartStudentInput']['chart_id']) );
        }
    }

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('charts', $this->Chart->find("all"));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        $inputs_para_excluir = array(3, 7);
        if ($this->request->is('post')) {
            $this->Chart->create();

            if($this->request->data['Chart']['type'] == "line") {
                $this->request->data['Chart']['display_mode'] = "mes_a_mes";
            }
            
            if ($this->Chart->save($this->request->data)) {
                $this->Session->setFlash(__('O output foi adicionado.'));
            } else {
                $this->Session->setFlash(__('Não foi possível adicionar o output.'));
            }
        }
        $students = $this->Chart->Student->find('list');
        $options = array(
            'conditions' => array(
                'NOT' => array(
                    'Input.id' => $inputs_para_excluir
                )
            )
        );
        $inputs = $this->Chart->Input->find('list', $options);
        $this->set(compact('students', 'inputs'));

        $this->Session->write("houve_criacao", $this->Chart->getLastInsertID());

        return $this->redirect(array('controller' => 'students', 'action' => 'edit', $this->request->data['Chart']['student_id'], '#' => 'outputs' ));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->layout = "iframe";

        $options = array('conditions' => array('Chart.' . $this->Chart->primaryKey => $id));
        $old_chart = $this->Chart->find('first', $options);

        if (!$this->Chart->exists($id)) {
            throw new NotFoundException(__('Invalid chart'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Chart->save($this->request->data)) {

                // se trocar o tipo de input, deletar todos os chart_student_input antigos
                if($this->request->data['Chart']['input_id'] != $old_chart['Chart']['input_id']) {
                    $this->loadModel("ChartStudentInput");

                    $this->ChartStudentInput->deleteAll(array(
                        'ChartStudentInput.chart_id' => $id
                    ));

                    $this->Session->setFlash(__('O gráfico foi salvo e os inputs antigos foram deletados.'));
                } else {

                    $this->Session->setFlash(__('O gráfico foi salvo.'));
                }
                return $this->redirect(array('action' => 'edit', $id, '#' => 'passo-2'));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o gráfico. Tente novamente.'));
                return $this->redirect(array('action' => 'edit', $id, '#' => 'passo-2'));
            }
        } else {
            $this->request->data = $old_chart;
        }
        $students = $this->Chart->Student->find('list');


        $student_inputs = array();
        $options = array(
            'conditions' => array(
                'StudentInput.student_id' => $this->request->data['Chart']['student_id'],
                'StudentInput.input_id' => $this->request->data['Chart']['input_id'],
            )
        );
        $tmp = $this->Chart->Student->StudentInput->find("all", $options);

        foreach($tmp as $t) {

            if(!in_array($t['StudentInput']['id'], $student_inputs)) {
                $student_inputs[$t['StudentInput']['id']] = $t['StudentInput']['name'] . ' (' . $t['StudentInput']['actor'] . ')';
            }
        }

        $options = array(
            'conditions' => array(
                'ChartStudentInput.chart_id' => $id
            ),
            'contain' => array(
                'StudentInput'
            )
        );
        $chart_student_inputs = $this->ChartStudentInput->find("all", $options);

        $inputs_para_excluir = array(3, 7);

        $options = array(
            'conditions' => array(
                'NOT' => array(
                    'Input.id' => $inputs_para_excluir
                )
            )
        );

        $inputs = $this->Chart->Input->find('list', $options);

        $this->set(compact('students', 'student_inputs', 'chart_student_inputs', 'inputs'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Chart->id = $id;
        $chart = $this->Chart->read();

        if (!$this->Chart->exists()) {
            throw new NotFoundException(__('Invalid chart'));
        }
        if ($this->Chart->delete()) {
            $this->Session->setFlash(__('O gráfico foi deletado.'));
        } else {
            $this->Session->setFlash(__('Não foi possível deletar o gráfico.'));
        }
        return $this->redirect(array('controller' => 'students', 'action' => 'edit', $chart['Chart']['student_id'], '#' => 'outputs'));
    }

    public function delete_input($id = null, $chart_id = null) {
        $this->ChartStudentInput->id = $id;
        if (!$this->ChartStudentInput->exists()) {
            throw new NotFoundException(__('Invalid ChartStudentInput'));
        }
        if ($this->ChartStudentInput->delete()) {
            $this->Session->setFlash(__('O input foi removido.'));
        } else {
            $this->Session->setFlash(__('Não foi possível remover o input.'));
        }
        return $this->redirect(array('action' => 'edit', $chart_id));
    }
}
