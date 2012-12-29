<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * Auto Model
 *
 * @property Concesionaria $Concesionaria
 * @property Turno $Turno
 */
class Auto extends GeneralAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'producto';


	public $actsAs = array(
		'Search.Searchable',
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'producto' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'color' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vim' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'concesionaria_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Concesionaria' => array(
			'className' => 'General.Concesionaria',
			'foreignKey' => 'concesionaria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modelo' => array(
			'className' => 'General.Modelo',
			'foreignKey' => 'modelo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Turno' => array(
			'className' => 'General.Turno',
			'foreignKey' => 'auto_id',
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
 * Filter search fields
 *
 * @var array
 * @access public
 */
	public $filterArgs = array(
		'concesionaria_id' => array('type' => 'value'),
		'producto' => array('type' => 'like', 'field' => array('Auto.producto', 'Auto.color', 'Auto.vim','Auto.patentamiento')),
	);

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'id',
		'producto',
		'vim',
		'patentamiento',
		'Concesionaria.title' => 'Concesionaria',
		'color',
		'status' => array('type' => 'boolean'),
	);

/**
 * Edit fields for this model
 *
 * @var array
 */
	protected $_editFields = array(
		'producto',
		'color',
		'vim',
		'patentamiento',
		'concesionaria_id',
		'status',
	);

	/**
	 * Listado de autos separados por concesionaria.
	 */
	public function listByConcesionarias ($conditions = null){
		$_conditions = array(
			//'Auto.status' 			=> true,
			//'Concesionaria.status'	=> true
		);
		if ($conditions){
			$_conditions = array_merge($_conditions, $conditions);
		}
		return $this->find('list', array(
			'contain' 	=> array(),
			'joins'		=> array(
				array(
					'table' 		=> 'concesionarias',
					'alias' 		=> 'Concesionaria',
					'type'			=> 'inner',
					'conditions' 	=> array(
						'Concesionaria.id = Auto.concesionaria_id',
					),
				),
			),
			'conditions'=> $_conditions,
			'fields'	=> array(
				'Auto.id', 'Auto.producto', 'Concesionaria.title'
			)
		));
	}

}
