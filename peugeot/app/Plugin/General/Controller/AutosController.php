<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Autos Controller
 *
 * @property Auto $Auto
 */
class AutosController extends GeneralAppController {


	public $components = array(
		'Search.Prg',
	);

/**
 * Preset Variables Search
 *
 * @var array
 * @access public
 */
	public $presetVars = array(
		'producto' => array('type' => 'value'),
		'concesionaria_id' => array('type' => 'lookup', 'formField' => 'concesionaria_input', 'modelField' => 'title', 'model' => 'Concesionaria')
	);

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('title_for_layout', __('Autos'));
		$this->Prg->commonProcess();
		$searchFields = array('concesionaria_id', 'producto');

		$this->Auto->recursive = 0;
		$this->paginate['conditions'] = $this->Auto->parseCriteria($this->passedArgs);

		$this->set('autos', $this->paginate());
		$this->set('concesionarias', $this->Auto->Concesionaria->find('list'));
		$this->set('displayFields', $this->Auto->displayFields());
		$this->set('searchFields', $searchFields);
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Auto->create();
			if ($this->Auto->save($this->request->data)) {
				$this->Session->setFlash(__('The auto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auto could not be saved. Please, try again.'));
			}
		}
		$modelos = $this->Auto->Modelo->find('list');
		$concesionarias = $this->Auto->Concesionaria->find('list');
		$this->set(compact('concesionarias', 'mcrypt_module_close(td)'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Auto->exists($id)) {
			throw new NotFoundException(__('Invalid auto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Auto->save($this->request->data)) {
				$this->Session->setFlash(__('The auto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The auto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Auto.' . $this->Auto->primaryKey => $id));
			$this->request->data = $this->Auto->find('first', $options);
		}
		$modelos = $this->Auto->Modelo->find('list');
		$concesionarias = $this->Auto->Concesionaria->find('list');
		$this->set(compact('concesionarias', 'modelos'));
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
		$this->Auto->id = $id;
		if (!$this->Auto->exists()) {
			throw new NotFoundException(__('Invalid auto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Auto->delete()) {
			$this->Session->setFlash(__('Auto deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Auto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
