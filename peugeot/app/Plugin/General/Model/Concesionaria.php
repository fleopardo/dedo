<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * Concesionaria Model
 *
 * @property Auto $Auto
 * @property Turno $Turno
 */
class Concesionaria extends GeneralAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Auto' => array(
			'className' => 'General.Auto',
			'foreignKey' => 'concesionaria_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Turno' => array(
			'className' => 'General.Turno',
			'foreignKey' => 'concesionaria_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'id',
		'title',
		'carboy',
		'status' => array('type' => 'boolean'),
	);

/**
 * Edit fields for this model
 *
 * @var array
 */
	protected $_editFields = array(
		'title',
		'latitud',
		'longitud',
		'carboy',
		'status',
	);

	/**
	 * Devuelve el listado de concesionarias filtradas por modelo de auto.
	 */
	public function getListByModelo ($modelo_id){
		return $this->find('all', array(
			'contain' 		=> array(),
			'joins'			=> array(
				array(
					'table' 		=> 'autos',
					'alias' 		=> 'Auto',
					'type'			=> 'inner',
					'conditions' 	=> array(
						'Concesionaria.id = Auto.concesionaria_id',
					),
				),
				array(
					'table' 		=> 'modelos',
					'alias' 		=> 'Modelo',
					'type'			=> 'inner',
					'conditions' 	=> array(
						'Modelo.id = Auto.modelo_id',
					),
				),
			),
			'conditions' 	=> array(
				'Modelo.id' => $modelo_id,
				'Concesionaria.status' => true
			),
			'fields' => array('Concesionaria.*')
		));
	}
}