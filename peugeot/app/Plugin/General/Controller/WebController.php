<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Autos Controller
 *
 * @property Auto $Auto
 */
class WebController extends GeneralAppController {

	public $uses = array('General.Auto');

	public function index(){}

	public function modelo_step2(){
		$modelos = $this->Auto->Modelo->find('list', array(
			'fields'		=> array('Modelo.id', 'Modelo.title'),	
			'conditions'	=> array('Modelo.status' => true)
		));
		$this->set('modelos',$modelos);
	}

	public function modelo_step3(){
		if ($this->request->is('ajax') && $this->request->query['modelo_id']){
			$this->Auto->Modelo->id = $this->request->query['modelo_id'];
			$titulo_modelo = $this->Auto->Modelo->field('title');
			$class_modelo = $this->Auto->Modelo->field('class');
			$concesionarias = $this->Auto->Concesionaria->getListByModelo($this->request->query['modelo_id']);

			$months = $this->Auto->Turno->getListMonths($this->request->query['modelo_id'], $concesionarias[0]['Concesionaria']['id']);

			$dias = $this->Auto->Turno->getListDaysMonth($this->request->query['modelo_id'], $concesionarias[0]['Concesionaria']['id'], array_shift(array_keys($months)));

			$turnos = $this->Auto->Turno->getListHorario($this->request->query['modelo_id'], $concesionarias[0]['Concesionaria']['id'], array_shift(array_keys($months)), array_shift(array_keys($dias)));

			$this->set(compact('concesionarias', 'dias', 'months', 'turnos', 'titulo_modelo', 'class_modelo'));
		}
	}

	public function getDays(){
		if (!$this->request->is('ajax')){
			$this->redirect($this->referer());
		}
		try{
			$dias = $this->Auto->Turno->getListDaysMonth($this->request->query['modelo'], $this->request->query['concesionaria'], $this->request->query['mes']);

			$key_dias = array_keys($dias);
			$turnos = $this->Auto->Turno->getListHorario($this->request->query['modelo'], $this->request->query['concesionaria'], $this->request->query['mes'], array_shift($key_dias));
			$success = true;
		} catch (Exception $e){
			$dias = null;
			$turnos = null;
			$success = false;
		}
		$this->set(compact('dias', 'success', 'turnos'));
        $this->set('_serialize', array('dias', 'success', 'turnos'));
	}

	public function getTurnos(){
		if (!$this->request->is('ajax')){
			$this->redirect($this->referer());
		}
		try{
			$turnos = $this->Auto->Turno->getListHorario($this->request->query['modelo'], $this->request->query['concesionaria'], $this->request->query['mes'], $this->request->query['dia']);
			$success = true;
		} catch (Exception $e){
			$turnos = null;
			$success = false;
		}
		$this->set(compact('success', 'turnos'));
        $this->set('_serialize', array('success', 'turnos'));
	}

	public function getConcesionaria(){
		if (!$this->request->is('ajax')){
			$this->redirect($this->referer());
		}
		try{
			$months = $this->Auto->Turno->getListMonths($this->request->query['modelo'], $this->request->query['concesionaria']);
			$k_months = array_keys($months);
			$month = array_shift($k_months);
			$dias = $this->Auto->Turno->getListDaysMonth($this->request->query['modelo'], $this->request->query['concesionaria'], $month);

			$k_dias = array_keys($dias);
			$dia = array_shift($k_dias);
			$turnos = $this->Auto->Turno->getListHorario($this->request->query['modelo'], $this->request->query['concesionaria'], $month,$dia);
			$success = true;
		} catch (Exception $e){
			$turnos = null;
			$dias = null;
			$months = null;
			$success = false;
		}
		$this->set(compact('dias', 'success', 'turnos', 'months'));
        $this->set('_serialize', array('dias', 'success', 'turnos', 'months'));
	}

	public function ubicacion_step2(){
		if (!$this->request->is('ajax')){
			$this->redirect($this->referer());
		}
		$concesionarias = $this->Auto->Concesionaria->find('all', array('contain' => array(), 'conditions' => array('status' => true)));

		$k_concesionarias = array_keys($concesionarias);
		$concesionaria = $concesionarias[0]['Concesionaria']['id'];
		$months = $this->Auto->Turno->getListMonths(null, $concesionaria);

		$k_months = array_keys($months);
		$month = array_shift($k_months);
		$dias = $this->Auto->Turno->getListDaysMonth(null, $concesionaria, $month);

		$k_dias = array_keys($dias);
		$turnos = $this->Auto->Turno->getListHorario(null, $concesionaria, $month, array_shift($k_dias));

		$this->set(compact('concesionarias', 'dias', 'months', 'turnos'));
	}

	public function ubicacion_step3(){
		$turno = $this->Auto->Turno->read(null, $this->request->query['turno']);
		$turnos = $this->Auto->Turno->getListByUbicacion($this->request->query['turno'], $this->request->query['concesionaria'], $this->request->query['dia'], $this->request->query['month']);
		$autos = $this->Auto->Turno->getListByUbicacion($this->request->query['turno'], $this->request->query['concesionaria'], $this->request->query['dia'], $this->request->query['month'], array('Modelo.id', 'Modelo.id'));
		$this->set(compact('turnos', 'turno', 'autos'));
	}

	public function confirmacion ($id = null){
		
		if (($this->request->is('post') || $this->request->is('put')) && $this->Auto->Turno->exists($id) ) {
			$this->Auto->Turno->id = $id;
			if (!$this->Auto->Turno->field('status')){
				$this->request->data['Turno']['status'] = true;
				if ($this->Auto->Turno->save($this->request->data)) {
					$this->request->data = $this->Auto->Turno->find('first', array(
						'contian' 		=> array('Concesionaria'),
						'conditions' 	=> array('Turno.id' => $id)
					));
					Croogo::dispatchEvent('Controller.Web.nuevoTurno', $this);
					$this->Session->setFlash(__('El Turno ha sido guardado'));
					$this->redirect('/');
				} else {
					$this->Session->setFlash(__('El turno no pudo guardarse, intente nuevamente.'));
				}
			} else {
				$this->Session->setFlash(__('El turno ya ha sido tomado, intente nuevamente'));
			}
		} else if (isset($this->request->query['turno'])){
			$this->request->data = $this->Auto->Turno->find('first', array(
				'contain'		=> array(
					'Concesionaria', 'Auto'
				),
				'conditions'	=> array(
					'Turno.id' 		=> $this->request->query['turno'],
					'Turno.status'		=> false,
					'Turno.finalizado'	=> false
				)
			));
		} else {
			$this->redirect('/');
		}
	}
}