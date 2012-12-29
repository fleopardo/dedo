<?php
class EmailsVariablesController extends EmailsAppController {

	var $name = 'EmailsVariables';

	function admin_index() {
        if (isset($this->params['named']['q'])) {
            App::import('Core', 'Sanitize');
            $q = Sanitize::clean($this->params['named']['q']);
            $this->data['Filter']['q'] = $this->params['named']['q'];
            $this->paginate['EmailsVariable']['conditions']['OR'] = array(
                                'EmailsVariable.name LIKE'     => '%' . $q . '%',
                            );
        }

		$this->EmailsVariable->recursive = 0;
		$this->set('emailsVariables', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid emails variable', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('emailsVariable', $this->EmailsVariable->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->EmailsVariable->create();
			if ($this->EmailsVariable->save($this->data)) {
				$this->Session->setFlash(__('The emails variable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails variable could not be saved. Please, try again.', true));
			}
		}
		$emailsTemplates = $this->EmailsVariable->EmailsTemplate->find('list');
		$this->set(compact('emailsTemplates'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid emails variable', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EmailsVariable->save($this->data)) {
				$this->Session->setFlash(__('The emails variable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emails variable could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EmailsVariable->read(null, $id);
		}
		$emailsTemplates = $this->EmailsVariable->EmailsTemplate->find('list');
		$this->set(compact('emailsTemplates'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for emails variable', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EmailsVariable->delete($id)) {
			$this->Session->setFlash(__('Emails variable deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Emails variable was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}



}
