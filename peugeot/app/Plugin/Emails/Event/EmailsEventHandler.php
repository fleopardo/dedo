<?php 
class EmailsEventHandler extends Object implements CakeEventListener {

	public function implementedEvents() {
		return array(
			'Controller.Web.nuevoTurno' => array(
				'callable' => 'onControllerNuevoTurno'
			),
			'Controller.Admin.finTurno' => array(
				'callable' => 'onControllerFinTurno'
			)
		);
	}

	public function onControllerNuevoTurno ($event){
		$model = $event->subject();
		$data = $model->request->data;	

		App::uses('EmailsQueue', 'Emails.Model');
		App::uses('EmailsTemplate', 'Emails.Model');
		$this->EmailsQueue = new EmailsQueue();
		$this->EmailsTemplate = new EmailsTemplate();


		$template = $this->EmailsTemplate->findByCode('nuevo_turno');

		$params = array(
			'to' 		=> $data['Turno']['email'],
			'priority'	=> 0
		);
		$_data = array(
			'url_base'		=> Router::url('/', true),
			'nombre'		=> $data['Turno']['nombre'],
			'turno_id'		=> $data['Turno']['id'],
			'fecha'			=> date('d/m/Y', strtotime($data['Turno']['fecha'])),
			'hora_inicio'	=> date('H:i',strtotime($data['Turno']['hora_inicio'])),
			'hora_fin'		=> date('H:i',strtotime($data['Turno']['hora_fin'])),
			'concesionaria'	=> $data['Concesionaria']['title']
		);
		$this->__add($template,$params,$_data);

	}


	public function onControllerFinTurno ($event){
		$model = $event->subject();
		$data = $model->request->data;	

		App::uses('EmailsQueue', 'Emails.Model');
		App::uses('EmailsTemplate', 'Emails.Model');
		$this->EmailsQueue = new EmailsQueue();
		$this->EmailsTemplate = new EmailsTemplate();


		$template = $this->EmailsTemplate->findByCode('fin_turno');

		$params = array(
			'to' 		=> $data['Turno']['email'],
			'priority'	=> 0
		);
		$_data = array(
			'url_base'		=> Router::url('/', true),
			'nombre'		=> $data['Turno']['nombre']
		);
		$this->__add($template,$params,$_data);

	}

//	public function onModelNewActiveCampaigns ($event) {
//		$model = $event->subject();
		//
//		App::uses('EmailsQueue', 'Emails.Model');
//		App::uses('EmailsTemplate', 'Emails.Model');
//		$this->EmailsQueue = new EmailsQueue();
//		$this->EmailsTemplate = new EmailsTemplate();
		//
//		$template = $this->EmailsTemplate->findByCode('new_campaign');
//		foreach ($event->data as $campaign){
//			foreach ($campaign['Animal'] as $animal){
//				$data = array(); $params = array();
//				if (isset($animal['Owner'][0])){
//					$owner = $animal['Owner'][0];
//					$params = array(
//						'to' 		=> $owner['email'],
//						'priority'	=> 0
//					);
//					$data = array(
//						'nombre'	=> $owner['firstname'],
//						'apellido'	=> $owner['lastname'],
//						'animal'	=> $animal['name'],
//						'campaña'	=> $campaign['Campaign']['title']
//					);
//					$this->__add($template,$params,$data);
//				}
//			}
//		}
//	}
	//
	//
//	public function onControllerUserRegistration ($event){
//		$controller = $event->subject();
				//
//		App::uses('EmailsQueue', 'Emails.Model');
//		App::uses('EmailsTemplate', 'Emails.Model');
//		$this->EmailsQueue = new EmailsQueue();
//		$this->EmailsTemplate = new EmailsTemplate();
//		$data = $event->data;
//		$template = $this->EmailsTemplate->findByCode('new_user');
		//
//		$params = array(
//			'to' 		=> $data['owner']['Owner']['email'],
//			'priority'	=> 0
//		);
//		$_data = array(
//			'nombre'	=> $data['owner']['Owner']['firstname'],
//			'apellido'	=> $data['owner']['Owner']['lastname'],
//			'url'		=> Router::url(array(
//								'plugin'	=> 'users',
//								'controller'=> 'Users',
//								'action' 	=> 'activate',
//								$data['data']['User']['username'],
//								$data['data']['User']['activation_key']
//							), true)
//		);
//		$this->__add($template,$params,$_data);
//	}
	//
	//
//	public function onControllerOwnerAdd ($event){
//		$controller = $event->subject();
		//
//		App::uses('EmailsQueue', 'Emails.Model');
//		App::uses('EmailsTemplate', 'Emails.Model');
//		$this->EmailsQueue = new EmailsQueue();
//		$this->EmailsTemplate = new EmailsTemplate();
//		$data = $event->data;
		//
//		$template = $this->EmailsTemplate->findByCode('new_owner');
		//
//		$params = array(
//			'to' 		=> $data['Owner']['email'],
//			'priority'	=> 0
//		);
//		$_data = array(
//			'nombre'	=> $data['Owner']['firstname'],
//			'apellido'	=> $data['Owner']['lastname'],
//			'url'		=> Router::url(array(
//								'plugin'	=> 'animals',
//								'controller'=> 'Owners',
//								'action' 	=> 'activate',
//								$data['Owner']['dni'],
//								$data['Owner']['activation_key']
//							), true)
//		);
//		$this->__add($template,$params,$_data);
//	}
		
	
	private function __add($template, $params = array(), $data = array()){
		$variables = Set::format($template['EmailsVariable'], '[%{0}%]', array('{n}.code'));
		if (isset ($params['to']) && is_string($params['to'])){
			$params['to'] = array($params['to']);
		}
		if (isset ($params['bcc']) && is_string($params['bcc'])){
			$params['bcc'] = array($params['bcc']);
		}
		
		$emailsQueue['EmailsQueue']['emails_sender_id'] = $template['EmailsTemplate']['emails_sender_id'];
		$emailsQueue['EmailsQueue']['body'] = $template['EmailsTemplate']['body'];
		$emailsQueue['EmailsQueue']['subject'] = $template['EmailsTemplate']['subject'];
		$emailsQueue['EmailsQueue']['priority'] = $params['priority'];
// 		$emailsQueue['EmailsQueue']['from'] = $template['EmailsSender']['email'];
		
		
		foreach($data as $k => $v){
			$emailsQueue['EmailsQueue']['body'] = str_replace('[%'.$k.'%]', $v, $emailsQueue['EmailsQueue']['body']);
			$emailsQueue['EmailsQueue']['subject'] = str_replace('[%'.$k.'%]', $v, $emailsQueue['EmailsQueue']['subject']);
// 			$emailsQueue['EmailsQueue']['from'] = str_replace('[%'.$k.'%]', $v, $emailsQueue['EmailsQueue']['from']);
		}
		if (isset($params['to'])){
			$emailsQueue['EmailsQueue']['to'] = implode(', ', $params['to']);
		}
		if (isset($params['bcc'])){
			$emailsQueue['EmailsQueue']['bcc'] = implode(', ', $params['bcc']);
		}
		
		$this->EmailsQueue->create();
		$this->EmailsQueue->save($emailsQueue);
	}
}