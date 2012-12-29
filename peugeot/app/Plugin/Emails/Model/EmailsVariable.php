<?php
class EmailsVariable extends EmailsAppModel {
	var $name = 'EmailsVariable';
	var $displayField = 'code';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'EmailsTemplate' => array(
			'className' => 'Emails.EmailsTemplate',
			'joinTable' => 'emails_templates_emails_variables',
			'foreignKey' => 'emails_variable_id',
			'associationForeignKey' => 'emails_template_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}