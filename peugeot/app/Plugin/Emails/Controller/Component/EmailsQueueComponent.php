<?php
class EmailsQueueComponent extends Component {
	
    var $controller = null;
    
	public function initialize(&$controller) {
        $this->controller =& $controller;
	}

    /**
    * Agrega un email a la cola de emails, para luego ser enviado
    * 
    * @param mixed $template_code: Codigo del template para generar el email.
    * @param mixed $to: Array o string con los destinatarios del email.
    * @param mixed $params: Array con los parametros necesarios para generar el email.
    */
    public function add($template_code = null, $to = null, $params = array(), $priority = 0, $bcc = array(), $from = null){
    	$this->controller->loadModel('Emails.EmailsTemplate');
        $this->controller->loadModel('Emails.EmailsQueue');
        $template = $this->controller->EmailsTemplate->findByCode($template_code);
        if(empty($template))
        	return false;

        	
        $variables = Set::format($template['EmailsVariable'], '[%{0}%]', array('{n}.code'));
        if(is_string($to)){
            $to = array($to);
        }
        if(is_string($bcc)){
            $bcc = array($bcc);
        }
        $emailsQueue['EmailsQueue']['emails_sender_id'] = $template['EmailsTemplate']['emails_sender_id'];
        $emailsQueue['EmailsQueue']['body'] = $template['EmailsTemplate']['body'];
        $emailsQueue['EmailsQueue']['subject'] = $template['EmailsTemplate']['subject'];
        $emailsQueue['EmailsQueue']['priority'] = $priority;
        $emailsQueue['EmailsQueue']['from'] = $from;
        

		$params['webroot'] = $this->controller->webroot;

        foreach($params as $k => $v){
            $emailsQueue['EmailsQueue']['body'] = str_replace('[%'.$k.'%]', $v, $emailsQueue['EmailsQueue']['body']);
            $emailsQueue['EmailsQueue']['subject'] = str_replace('[%'.$k.'%]', $v, $emailsQueue['EmailsQueue']['subject']);
            $emailsQueue['EmailsQueue']['from'] = str_replace('[%'.$k.'%]', $v, $emailsQueue['EmailsQueue']['from']);
        }
        $emailsQueue['EmailsQueue']['to'] = implode(', ', $to);
        $emailsQueue['EmailsQueue']['bcc'] = implode(', ', $bcc);
        $this->controller->EmailsQueue->create();
        return $this->controller->EmailsQueue->save($emailsQueue);
        
    }
}
?>