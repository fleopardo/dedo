<?php
App::uses('EmailsAppModel', 'Emails.Model');
/**
 * EmailsTemplate Model
 *
 * @property EmailsSender $EmailsSender
 * @property EmailsVariable $EmailsVariable
 */
class EmailsTemplate extends EmailsAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    var $actsAs = array(
        'Utils.Ordered' => array(
            'field' => 'weight',
            'foreign_key' => null,
        ));
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'emails_sender_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'EmailsSender' => array(
			'className' => 'Emails.EmailsSender',
			'foreignKey' => 'emails_sender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'EmailsVariable' => array(
			'className' => 'Emails.EmailsVariable',
			'joinTable' => 'emails_templates_emails_variables',
			'foreignKey' => 'emails_template_id',
			'associationForeignKey' => 'emails_variable_id',
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
