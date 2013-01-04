<?php  
// App::import('Core', 'Controller'); 
// App::import('Component', 'Email'); 
// App::import('Component', 'EmailSes.EmailSes'); 

App::uses('CakeEmail', 'Network/Email');
class ProcessQueueTask extends Shell { 
	
	public $Email; 

    function execute($emailsToProcess) { 
    	$this->Email = new CakeEmail();
        if(count($emailsToProcess) > 0){
            $emailsSent = array();
            $emailsNotSent = array();
            foreach($emailsToProcess as $email){
                $this->Email->reset();
                $this->Email->config(array(
                	'transport' => $email['EmailsSender']['delivery'],
                	'host'		=> $email['EmailsSender']['host'],
                	'port' 		=> $email['EmailsSender']['port'],
                	'timeout'	=> $email['EmailsSender']['timeout'],
                	'username' 	=> $email['EmailsSender']['username'],
                	'password' 	=> $email['EmailsSender']['password']
                ));

                $this->Email->from(array($email['EmailsSender']['email'] => $email['EmailsSender']['title']));
                $this->Email->subject($email['EmailsQueue']['subject']);
                
                $this->Email->to($email['EmailsQueue']['to']);
                $mails_bcc = explode(',', $email['EmailsQueue']['bcc']);
                if ($mails_bcc){
	                foreach ($mails_bcc as $_bcc){
	                	if ($_bcc != ''){
	                		$this->Email->bcc(trim($_bcc));
	                	}
	                }
                }
                $this->Email->emailFormat('html');

                if($this->Email->send($email['EmailsQueue']['body'])){
                    array_push($emailsSent, $email['EmailsQueue']['id']);
                }else{
                    array_push($emailsNotSent, $email['EmailsQueue']['id']);
                }
            }
            
            $this->out('- Emails sent: '.implode(', ', $emailsSent));
            $this->out('- Emails not sent: '.implode(', ', $emailsNotSent));
            
            return $emailsSent;
        }else{
            $this->out('- No emails to send.');
            return null;
        }
    } 

/** 
* Change default variables 
* Fancy if you want to send many emails and only want 
* to change 'from' or few keys 
* 
* @param array $settings 
*/ 
    function settings() { 
        if(Configure::read('Emails.delivery') == 'smtp'){
            $this->Email->delivery = 'smtp';
            $this->Email->smtpOptions = array(
                'port'=> Configure::read('Emails.port'),
                'timeout'=> Configure::read('Emails.timeout'),
                'host' => Configure::read('Emails.host'),
                'username'=> Configure::read('Emails.username'),
                'password'=> Configure::read('Emails.password')
            );
        }
    } 
} 
?> 