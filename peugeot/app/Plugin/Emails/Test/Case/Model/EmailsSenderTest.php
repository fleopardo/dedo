<?php
/* EmailsSender Test cases generated on: 2012-07-23 20:33:54 : 1343086434*/
App::import('Model', 'Emails.EmailsSender');

class EmailsSenderTestCase extends CakeTestCase {
	var $fixtures = array('plugin.emails.emails_sender', 'app.emails_template');

	function startTest() {
		$this->EmailsSender =& ClassRegistry::init('EmailsSender');
	}

	function endTest() {
		unset($this->EmailsSender);
		ClassRegistry::flush();
	}

}
