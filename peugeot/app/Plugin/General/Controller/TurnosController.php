<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Turnos Controller
 *
 * @property Turno $Turno
 */
class TurnosController extends GeneralAppController {



	public $components = array(
		'Search.Prg',
	);

	public $presetVars = array(
		'title' => array('type' => 'value'),
		'auto_id' => array('type' => 'lookup', 'formField' => 'auto_input', 'modelField' => 'producto', 'model' => 'Auto'),
		'concesionaria_id' => array('type' => 'lookup', 'formField' => 'concesionaria_input', 'modelField' => 'title', 'model' => 'Concesionaria'),
		'fecha' => array('type' => 'value'),
		'hora_inicio' => array('type' => 'value'),
		'hora_fin' => array('type' => 'value'),
		'status' => array('type' => 'value'),
		'finalizado' => array('type' => 'value')
	);

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('title_for_layout', __('Turnos'));
		$this->Prg->commonProcess();
		$searchFields = array('concesionaria_id', 'auto_id', 
			'title' => array('label' => 'texto'), 
			'fecha' => array( 'type' => 'text', 'class' => 'datepicker'), 
			'hora_inicio' => array('label' => 'Inicio desde', 'type' => 'text', 'class' => 'timepicker'), 
			'hora_fin' => array('label' => 'Inicio hasta', 'type' => 'text', 'class' => 'timepicker'),
			'status' => array('options' => array('1' => 'Reservado', '0' => 'Disponible'), 'empty' => ''),
			'finalizado' => array('options' => array('1' => 'Finalizado', '0' => 'No finalizado'), 'empty' => '')
		);

		$this->Turno->recursive = 0;
		$this->paginate['conditions'] = $this->Turno->parseCriteria($this->passedArgs);

		if (isset($this->params['named']['hora_inicio']) && !empty($this->params['named']['hora_inicio'])){
			$this->paginate['conditions']['Turno.hora_inicio >='] = $this->params['named']['hora_inicio'];
		}
		if (isset($this->params['named']['hora_fin']) && !empty($this->params['named']['hora_fin'])){
			$this->paginate['conditions']['Turno.hora_inicio <='] = $this->params['named']['hora_fin'];
		}

		$_concesionariaId = $this->Session->read('Auth.User.concesionaria_id');
		if (isset ($_concesionariaId) && !empty ($_concesionariaId)){
			$this->paginate['conditions']['Turno.concesionaria_id'] = $_concesionariaId;
		}

		$this->set('turnos', $this->paginate());
		$this->set('concesionarias', $this->Turno->Concesionaria->find('list'));
		$this->set('autos', $this->Turno->Auto->find('list', array('fields' => array('Auto.id', 'Auto.producto'))));
		$this->set('displayFields', $this->Turno->displayFields());
		$this->set('searchFields', $searchFields);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Turno->exists($id)) {
			throw new NotFoundException(__('Invalid turno'));
		}
		$options = array('conditions' => array('Turno.' . $this->Turno->primaryKey => $id));
		$this->set('turno', $this->Turno->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Turno->create();
			if ($this->Turno->save($this->request->data)) {
				if ($this->request->data['Turno']['finalizado']){
					Croogo::dispatchEvent('Controller.Admin.finTurno', $this);
				}
				$this->Session->setFlash(__('The turno has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turno could not be saved. Please, try again.'));
			}
		}
		$autos = $this->Turno->Auto->find('list');
		$concesionarias = $this->Turno->Concesionaria->find('list');
		$this->set(compact('autos', 'concesionarias'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Turno->exists($id)) {
			throw new NotFoundException(__('Invalid turno'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Turno->save($this->request->data)) {

				if ($this->request->data['Turno']['finalizado']){
					Croogo::dispatchEvent('Controller.Admin.finTurno', $this);
				}
				$this->Session->setFlash(__('The turno has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turno could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Turno.' . $this->Turno->primaryKey => $id));
			$this->request->data = $this->Turno->find('first', $options);
		}
		$autos = $this->Turno->Auto->find('list');
		$concesionarias = $this->Turno->Concesionaria->find('list');
		$this->set(compact('autos', 'concesionarias'));
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
		$this->Turno->id = $id;
		if (!$this->Turno->exists()) {
			throw new NotFoundException(__('Invalid turno'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Turno->delete()) {
			$this->Session->setFlash(__('Turno deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Turno was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function admin_generar (){

		if ($this->request->is('post') || $this->request->is('put')) {
			$turnos = array();
			$fecha_desde = $this->Turno->deconstruct('fecha', $this->data['Turno']['fecha_desde']);
			$fecha_hasta = $this->Turno->deconstruct('fecha', $this->data['Turno']['fecha_hasta']);
			$hora_inicio = $this->Turno->deconstruct('hora_inicio', $this->data['Turno']['hora_inicio']);
			$hora_fin = $this->Turno->deconstruct('hora_fin', $this->data['Turno']['hora_fin']);

			$this->Turno->Auto->id = $this->data['Turno']['auto_id'];
			$_concesionaria_id = $this->Turno->Auto->field('concesionaria_id');

			while ($fecha_desde <= $fecha_hasta){
				$_h_inicio = strtotime($fecha_desde . ' ' . $hora_inicio);
				$_h_fin = strtotime($fecha_desde . ' ' . $hora_fin);

				if ($_h_inicio > $_h_fin){
					$_h_fin = strtotime('+1 day', $_h_fin);
				}
				while ($_h_inicio < $_h_fin){
					$_h_fin_turno = strtotime('+'. $this->data['Turno']['duracion'] .'minutes', $_h_inicio);
					$turnos[] = array(
						'hora_inicio'		=> date('H:i', $_h_inicio),
						'hora_fin' 			=> date('H:i', $_h_fin_turno),
						'fecha'				=> $fecha_desde,
						'auto_id'			=> $this->data['Turno']['auto_id'],
						'concesionaria_id'	=> $_concesionaria_id,
						'status'			=> false,
						'finalizado'		=> false,						
					);
					$_h_inicio = $_h_fin_turno;
				}
				$fecha_desde = date('Y-m-d', strtotime('+1 day', strtotime($fecha_desde)));
			}

			if ($this->Turno->saveAll($turnos)) {
				$this->Session->setFlash(__('Los turnos han sido generados'));
				$this->redirect(array('action' => 'index'));
			} else {
				debug($this->Turno->invalidFields());die;
				$this->Session->setFlash(__('Los turnos no han sido generados, intente nuevamente.'));
			}
		} 
		$autos = $this->Turno->Auto->listByConcesionarias();
		$this->set(compact('autos'));
	}
}
