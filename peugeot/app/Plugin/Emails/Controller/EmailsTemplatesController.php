<?php
App::uses('EmailsAppController', 'Emails.Controller');
/**
 * EmailsTemplates Controller
 *
 * @property EmailsTemplate $EmailsTemplate
 */
class EmailsTemplatesController extends EmailsAppController {



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
            	'EmailsTemplate' => array(
            		'conditions' => array(
            			'OR' => array(
							'EmailsTemplate.code LIKE'     => '%' . $q . '%',
							'EmailsTemplate.name LIKE'     => '%' . $q . '%',
							'EmailsTemplate.subject LIKE'  => '%' . $q . '%',
							'EmailsTemplate.body LIKE'     => '%' . $q . '%',
            			)
            		)
            	) 
            ));
        }
        if (isset($this->params['named']['emails_sender_id'])) {
            $this->request->data['Filter']['emails_sender_id'] = $this->request->params['named']['emails_sender_id'];
            $this->paginate = Set::merge ($this->paginate, array(
            	'EmailsTemplate' => array(
	            	'conditions' => array(
						'EmailsTemplate.emails_sender_id' => $this->request->params['named']['emails_sender_id']
	            	)
            	)
            ));
        }
		$this->EmailsTemplate->recursive = 0;
		$this->set('emailsTemplates', $this->paginate());
		
		$emailsSenders = $this->EmailsTemplate->EmailsSender->find('list');
		$this->set(compact('emailsSenders'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EmailsTemplate->create();
			if ($this->EmailsTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The emails template has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails template could not be saved. Please, try again.'));
			}
		}
		$emailsSenders = $this->EmailsTemplate->EmailsSender->find('list');
		$emailsVariables = $this->EmailsTemplate->EmailsVariable->find('list');
		$this->set(compact('emailsSenders', 'emailsVariables'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->EmailsTemplate->id = $id;
		if (!$this->EmailsTemplate->exists()) {
			throw new NotFoundException(__('Invalid emails template'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmailsTemplate->save($this->request->data)) {
				$this->Session->setFlash(__('The emails template has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails template could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EmailsTemplate->read(null, $id);
		}
		$emailsSenders = $this->EmailsTemplate->EmailsSender->find('list', array('conditions' => array('status' => true)));
		$emailsVariables = $this->EmailsTemplate->EmailsVariable->find('list', array('fields' => array('id', 'code')));
		$this->set(compact('emailsSenders', 'emailsVariables'));
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
		$this->EmailsTemplate->id = $id;
		if (!$this->EmailsTemplate->exists()) {
			throw new NotFoundException(__('Invalid emails template'));
		}
		if ($this->EmailsTemplate->delete()) {
			$this->Session->setFlash(__('Emails template deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Emails template was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
    function admin_toggle_status($id){
        $model = $this->EmailsTemplate;
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

    public function admin_moveup($id, $step = 1) {
        if( $this->EmailsTemplate->moveup($id, $step) ) {
            $this->Session->setFlash(__('Moved up successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move up', true), 'default', array('class' => 'error'));
        }

        $this->redirect($this->referer());
    }

    public function admin_movedown($id, $step = 1) {
        if( $this->EmailsTemplate->movedown($id, $step) ) {
            $this->Session->setFlash(__('Moved down successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move down', true), 'default', array('class' => 'error'));
        }

        $this->redirect($this->referer());
    }

}
