<?php
App::uses('EmailsAppModel', 'Emails.Model');
class EmailsQueue extends EmailsAppModel {
	var $name = 'EmailsQueue';
	
	public $belongsTo = array(
		'EmailsSender' => array(
			'className' => 'Emails.EmailsSender',
			'foreignKey' => 'emails_sender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}