<?php
class EmailsQueuesController extends EmailsAppController {
	var $name = 'EmailsQueues';

	function admin_index() {
		$this->EmailsQueue = $this->Components->load('Emails.EmailsQueue');
		$this->EmailsQueue->initialize($this);
		$this->EmailsQueue->add('prueba', 'regueira@gmail.com', array('prueba' => '..aca esta la variable..'));
        if (isset($this->params['named']['q'])) {
            App::import('Core', 'Sanitize');
            $q = Sanitize::clean($this->params['named']['q']);
            $this->data['Filter']['q'] = $this->params['named']['q'];
            $this->paginate['EmailsQueue']['conditions']['OR'] = array(
                                'EmailsQueue.subject LIKE'     => '%' . $q . '%',
                                'EmailsQueue.to LIKE'     => '%' . $q . '%',
                                'EmailsQueue.body LIKE'     => '%' . $q . '%',
                            );	
        }

		$this->EmailsQueue->recursive = 0;
		$this->set('emailsQueues', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid emails queue', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('emailsQueue', $this->EmailsQueue->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->EmailsQueue->create();
			if ($this->EmailsQueue->save($this->data)) {
				$this->Session->setFlash(__('The emails queue has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails queue could not be saved. Please, try again.', true));
			}
		}
		$emailsSenders = $this->EmailsQueue->EmailsSender->find('list');
		$this->set(compact('emailsSenders'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid emails queue', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EmailsQueue->save($this->data)) {
				$this->Session->setFlash(__('The emails queue has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails queue could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EmailsQueue->read(null, $id);
		}
		$emailsSenders = $this->EmailsQueue->EmailsSender->find('list');
		$this->set(compact('emailsSenders'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for emails queue', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EmailsQueue->delete($id)) {
			$this->Session->setFlash(__('Emails queue deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Emails queue was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

    function admin_toggle_status($id){
        $model = $this->EmailsQueue;
        $model->contain();
        $row = $model->read(null, $id);
        $row[$model->name]['sent'] = $row[$model->name]['sent'] ? false : true;
        
        $result = $model->save($row);
        $this->set(compact('result'));
        $this->set('rank', 'status_toggle');
        $this->set('option',$row[$model->name]['sent']);
        $this->set('option_id', $id);
        $this->render('/elements/admin/admin_toggle');
    }
    
    function send_emails(){
        $this->loadModel('EmailsQueue');
        $emailsToProcess = $this->EmailsQueue->find(
            'all',
            array(
                'conditions' => array(
                    'EmailsQueue.sent' => 0
                ),
                'order' => array(
                    'EmailsQueue.priority' => 'DESC',
                    'EmailsQueue.created' => 'ASC'
                )
            )
        );
        
        if(count($emailsToProcess) > 0){
            $emailsSent = array();
            $emailsNotSent = array();
            foreach($emailsToProcess as $email){
//                 $this->EmailSes->reset();
//                 $this->EmailSes->to = $email['EmailsQueue']['to'];
//                 $this->EmailSes->subject = $email['EmailsQueue']['subject'];
//                 $this->EmailSes->bcc = explode(', ', $email['EmailsQueue']['bcc']);
//                 $this->EmailSes->from = 'info@leaptrade.com';
//                 $this->EmailSes->delivery = 'aws_ses_raw';
//                 $this->EmailSes->sendAs = 'html';

                if($this->EmailSes->send($email['EmailsQueue']['body'])){
                    array_push($emailsSent, $email['EmailsQueue']['id']);
                }else{
                    array_push($emailsNotSent, $email['EmailsQueue']['id']);
                }
            }
            
            $this->EmailsQueue->updateAll(
                array(
                    'EmailsQueue.sent' => 1
                ),
                array(
                    'EmailsQueue.id' => $emailsSent
                )
            );
            
            echo '- Emails sent: '.implode(', ', $emailsSent).'<br />';
            echo '- Emails not sent: '.implode(', ', $emailsNotSent).'<br />';
        }else{
            echo '- No emails to send.'.'<br />';
        }
    }

}
