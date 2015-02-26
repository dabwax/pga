<?php

class ChartsController extends AdminAppController {
    public $uses = array("Admin.Chart", "ChartStudentInput");

    public function add_input($id = null) {
        if($this->request->is('post')) {

            $this->Chart->ChartStudentInput->create();
            $this->Chart->ChartStudentInput->save(array(
                'chart_id' => $this->request->data['ChartStudentInput']['chart_id'],
                'student_input_id' => $this->request->data['ChartStudentInput']['student_input_id'],
            ));

            $this->Session->setFlash(__('O input foi adicionado ao gráfico.'));

            return $this->redirect( array('action' => 'edit', $id) );
        } else {
            return $this->redirect( array('action' => 'edit', $id) );
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
        if ($this->request->is('post')) {
            $this->Chart->create();
            if ($this->Chart->save($this->request->data)) {
                $this->Session->setFlash(__('The chart has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chart could not be saved. Please, try again.'));
            }
        }
        $students = $this->Chart->Student->find('list');
        $this->set(compact('students'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Chart->exists($id)) {
            throw new NotFoundException(__('Invalid chart'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chart->save($this->request->data)) {
                $this->Session->setFlash(__('The chart has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chart could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Chart.' . $this->Chart->primaryKey => $id));
            $this->request->data = $this->Chart->find('first', $options);
        }
        $students = $this->Chart->Student->find('list');
        $student_inputs = $this->Chart->Student->StudentInput->find("list");
        $options = array(
            'contain' => array(
                'StudentInput'
            )
        );
        $chart_student_inputs = $this->ChartStudentInput->find("all", $options);
        $this->set(compact('students', 'student_inputs', 'chart_student_inputs'));
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
        if (!$this->Chart->exists()) {
            throw new NotFoundException(__('Invalid chart'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Chart->delete()) {
            $this->Session->setFlash(__('The chart has been deleted.'));
        } else {
            $this->Session->setFlash(__('The chart could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
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
