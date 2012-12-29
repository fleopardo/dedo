<?php  
class ProcessEmailShell extends AppShell {
	public $uses = array('Emails.EmailsQueue');
    
	public $tasks = array('Emails.ProcessQueue');
	
    function main() {
    	Configure::write('Emails.status', 1);
        if(Configure::read('Emails.status') == 1){
			$emailsToProcess = $this->EmailsQueue->find('all',array(
				'conditions' => array(
					'EmailsQueue.sent' 		=> false
				),
				'order' => array(
					'EmailsQueue.priority' 	=> 'DESC',
					'EmailsQueue.created' 	=> 'ASC'
				)
			));

			$emailsSent = $this->ProcessQueue->execute($emailsToProcess);
			if ($emailsSent){
				$this->EmailsQueue->updateAll(
	                array(
	                    'EmailsQueue.sent' => 1
	                ),
	                array(
	                    'EmailsQueue.id' => $emailsSent
	                )
	            );
			}		
        }else{
            $this->out('- Emails System deactivated.');
        }
    } 
} 
?> 