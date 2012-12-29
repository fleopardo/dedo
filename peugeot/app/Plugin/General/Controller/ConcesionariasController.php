<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Concesionarias Controller
 *
 * @property Concesionaria $Concesionaria
 */
class ConcesionariasController extends GeneralAppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Concesionaria->recursive = 0;
		$this->set('concesionarias', $this->paginate());
		$this->set('displayFields', $this->Concesionaria->displayFields());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Concesionaria->exists($id)) {
			throw new NotFoundException(__('Invalid concesionaria'));
		}
		$options = array('conditions' => array('Concesionaria.' . $this->Concesionaria->primaryKey => $id));
		$this->set('concesionaria', $this->Concesionaria->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Concesionaria->create();
			if ($this->Concesionaria->save($this->request->data)) {
				$this->Session->setFlash(__('The concesionaria has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concesionaria could not be saved. Please, try again.'));
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
		if (!$this->Concesionaria->exists($id)) {
			throw new NotFoundException(__('Invalid concesionaria'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Concesionaria->save($this->request->data)) {
				$this->Session->setFlash(__('The concesionaria has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concesionaria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Concesionaria.' . $this->Concesionaria->primaryKey => $id));
			$this->request->data = $this->Concesionaria->find('first', $options);
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
		$this->Concesionaria->id = $id;
		if (!$this->Concesionaria->exists()) {
			throw new NotFoundException(__('Invalid concesionaria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Concesionaria->delete()) {
			$this->Session->setFlash(__('Concesionaria deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Concesionaria was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
