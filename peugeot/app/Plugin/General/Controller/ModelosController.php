<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Modelos Controller
 *
 * @property Modelo $Modelo
 */
class ModelosController extends GeneralAppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Modelo->recursive = 0;
		$this->set('modelos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Modelo->exists($id)) {
			throw new NotFoundException(__('Invalid modelo'));
		}
		$options = array('conditions' => array('Modelo.' . $this->Modelo->primaryKey => $id));
		$this->set('modelo', $this->Modelo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Modelo->create();
			if ($this->Modelo->save($this->request->data)) {
				$this->Session->setFlash(__('The modelo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modelo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Modelo->exists($id)) {
			throw new NotFoundException(__('Invalid modelo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Modelo->save($this->request->data)) {
				$this->Session->setFlash(__('The modelo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modelo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Modelo.' . $this->Modelo->primaryKey => $id));
			$this->request->data = $this->Modelo->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Modelo->id = $id;
		if (!$this->Modelo->exists()) {
			throw new NotFoundException(__('Invalid modelo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Modelo->delete()) {
			$this->Session->setFlash(__('Modelo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Modelo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
