<?php
/* EmailsTemplate Test cases generated on: 2012-07-23 20:36:12 : 1343086572*/
App::import('Model', 'Emails.EmailsTemplate');

class EmailsTemplateTestCase extends CakeTestCase {
	var $fixtures = array('plugin.emails.emails_template', 'app.emails_sender', 'app.emails_variable', 'app.emails_templates_emails_variable');

	function startTest() {
		$this->EmailsTemplate =& ClassRegistry::init('EmailsTemplate');
	}

	function endTest() {
		unset($this->EmailsTemplate);
		ClassRegistry::flush();
	}

}
