<?php
App::uses('EmailsAppController', 'Emails.Controller');
/**
 * EmailsSenders Controller
 *
 * @property EmailsSender $EmailsSender
 */
class EmailsSendersController extends EmailsAppController {



/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
        if (isset($this->params['named']['q'])) {
            App::uses('Sanitize', 'Utility');
            $q = Sanitize::clean($this->params['named']['q']);
            $this->request->data['Filter']['q'] = $this->params['named']['q'];
            $this->paginate = Set::merge ($this->paginate, array(
            	'EmailsSender' => array(
            		'conditions' => array(
            			'OR' => array(
							'EmailsSender.title LIKE'     => '%' . $q . '%',
							'EmailsSender.delivery LIKE'     => '%' . $q . '%',
							'EmailsSender.host LIKE'     => '%' . $q . '%',
							'EmailsSender.username LIKE'     => '%' . $q . '%',
							'EmailsSender.password LIKE'     => '%' . $q . '%',
            			)
            		)
            	) 
            ));
        }
		$this->EmailsSender->recursive = 0;
		$this->set('emailsSenders', $this->paginate());
		
			}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->EmailsSender->id = $id;
		if (!$this->EmailsSender->exists()) {
			throw new NotFoundException(__('Invalid emails sender'));
		}
		$this->set('emailsSender', $this->EmailsSender->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EmailsSender->create();
			if ($this->EmailsSender->save($this->request->data)) {
				$this->Session->setFlash(__('The emails sender has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails sender could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->EmailsSender->id = $id;
		if (!$this->EmailsSender->exists()) {
			throw new NotFoundException(__('Invalid emails sender'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmailsSender->save($this->request->data)) {
				$this->Session->setFlash(__('The emails sender has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails sender could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmailsSender->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->EmailsSender->id = $id;
		if (!$this->EmailsSender->exists()) {
			throw new NotFoundException(__('Invalid emails sender'));
		}
		if ($this->EmailsSender->delete()) {
			$this->Session->setFlash(__('Emails sender deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Emails sender was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
    function admin_toggle_status($id){
        $model = $this->EmailsSender;
        $model->contain();
        $row = $model->read(null, $id);
        $row[$model->name]['status'] = $row[$model->name]['status'] ? false : true;
        
        $result = $model->save($row);
        $this->set(compact('result'));
        $this->set('rank', 'status_toggle');
        $this->set('option',$row[$model->name]['status']);
        $this->set('option_id', $id);
        $this->render('/Elements/admin/admin_toggle');
    }


}
