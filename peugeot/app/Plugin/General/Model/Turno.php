<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * Turno Model
 *
 * @property Auto $Auto
 * @property Concesionaria $Concesionaria
 */
class Turno extends GeneralAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

	public $virtualFields = array(
		'month' => 'MONTH(Turno.fecha)',
		'monthDesc' => 'elt(MONTH(Turno.fecha), "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre")',
	    'day'	=> 'DAY(Turno.fecha)',
	    'horario' => 'CONCAT(DATE_FORMAT(Turno.hora_inicio, "%H:%i"), " - ", DATE_FORMAT(Turno.hora_fin,"%H:%i"))'
	);

	public $actsAs = array(
		'Search.Searchable',
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sexo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'licencia' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vencimiento' => array(
			'datetime' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'provincia' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'localidad' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'telefono' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nacimiento' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'auto_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'hora_inicio' => array(
			'time' => array(
				'rule' => array('time'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'hora_fin' => array(
			'time' => array(
				'rule' => array('time'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'finalizado' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		'Auto' => array(
			'className' => 'General.Auto',
			'foreignKey' => 'auto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Concesionaria' => array(
			'className' => 'General.Concesionaria',
			'foreignKey' => 'concesionaria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
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
		'auto_id'	=> array('type' => 'value'),
		'title' => array('type' => 'like', 'field' => array('Turno.nombre', 'Turno.id', 'Turno.email')),
		'fecha' => array('type' => 'value'),
		'status' => array('type' => 'value'),
		'finalizado' => array('type' => 'value')
//		'hora_inicio' => array('type' => 'value'),
//		'hora_fin' => array('type' => 'value')	
	);

/**
 * Display fields for this model
 *
 * @var array
 */
	protected $_displayFields = array(
		'id',
		'fecha',
		'hora_inicio',
		'hora_fin',
		'nombre',
		'Auto.producto' => 'Auto',
		'Concesionaria.title' => 'Concesionaria',
		'status' => array('type' => 'boolean'),
		'finalizado' => array('type' => 'boolean'),
	);

/**
 * Edit fields for this model
 *
 * @var array
 */
	protected $_editFields = array(
		'nombre',
		'email',
		'sexo',
		'licencia',
		'vencimiento',
		'provincia',
		'localidad',
		'telefono',
		'nacimiento',
		'auto_id',
		'concesionaria_id',
		'hora_inicio',
		'hora_fin',
		'fecha',
		'finalizado',
		'status',
	);

	public function getListMonths($modelo_id, $concesionaria_id ,$status = false){
		$_conditions = array(
			'Turno.status'		=> $status,
			'Turno.fecha >='	=> date('Y-m-d')
		);
		if ($modelo_id){
			$_conditions['Modelo.id'] = $modelo_id;
		}
		if ($concesionaria_id){
			$_conditions['Turno.concesionaria_id'] = $concesionaria_id;
		}
		return $this->find('list', array(
			'fields' 	=> array('Turno.month', 'Turno.monthDesc'),
			'joins'		=> array(
				array(
					'table' 		=> 'autos',
					'alias' 		=> 'Auto',
					'type'			=> 'inner',
					'conditions' 	=> array(
						'Turno.auto_id = Auto.id',
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
			'conditions'=> $_conditions,
			'group'		=> array('MONTH(fecha)')
		));
	}


	public function getListDaysMonth($modelo_id, $concesionaria_id, $month, $status = false){
		$_conditions = array(
			'Turno.status' 			=> $status,
			'MONTH(Turno.fecha)'	=> $month,
			'Turno.fecha >='		=> date('Y-m-d')
		);
		if ($modelo_id){
			$_conditions['Modelo.id'] = $modelo_id;
		}
		if ($concesionaria_id){
			$_conditions['Turno.concesionaria_id'] = $concesionaria_id;
		}
		return $this->find('list', array(
			'fields' 	=> array('Turno.day', 'Turno.day'),
			'joins'		=> array(
				array(
					'table' 		=> 'autos',
					'alias' 		=> 'Auto',
					'type'			=> 'inner',
					'conditions' 	=> array(
						'Turno.auto_id = Auto.id',
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
			'conditions'=> $_conditions,
			'group'	=> array('DAY(fecha)')
		));
	}


	public function getListHorario ($modelo_id, $concesionaria_id, $month, $day, $status = false){
		$this->Concesionaria->id = $concesionaria_id;
		$carboys = $this->Concesionaria->field('carboy');
		if ($carboys){
			$listado = $this->__getListHorario($modelo_id, $concesionaria_id, $month, $day, $status);
			foreach ($listado as $k=>$v){
				$horarios = explode('-',$v);
				$tomados = $this->find('count', array(
					'contain' 		=> array(),
					'conditions'	=> array (
						'Turno.status' 		=> true,
						'DAY(Turno.fecha)'	=> $day,
						'MONTH(Turno.fecha)'=> $month,
						'Turno.hora_inicio' => trim($horarios[0]),
						'Turno.hora_fin'	=> trim($horarios[1]),
						'Turno.concesionaria_id' => $concesionaria_id
					)
				));
				if ($tomados >= $carboys){
					unset($listado[$k]);
				}
			}
			return $listado;
		} 
		return array();
	}

	private function __getListHorario($modelo_id, $concesionaria_id, $month, $day, $status = false){
		$_conditions = array(
			'Turno.status' 			=> $status,
			'DAY(Turno.fecha)'		=> $day,
			'MONTH(Turno.fecha)'	=> $month,
			'OR' => array(
				'Turno.fecha >'		=> date('Y-m-d'),
				'AND' => array(
					'Turno.fecha'		=> date('Y-m-d'),
					'Turno.hora_inicio >='	=> date('H:i')
				)
			)
			
		);
		if ($modelo_id){
			$_conditions['Modelo.id'] = $modelo_id;
		}
		if ($concesionaria_id){
			$_conditions['Turno.concesionaria_id'] = $concesionaria_id;
		}
		return $this->find('list', array(
			'fields' 	=> array('Turno.id', 'Turno.horario'),
			'joins'		=> array(
				array(
					'table' 		=> 'autos',
					'alias' 		=> 'Auto',
					'type'			=> 'inner',
					'conditions' 	=> array(
						'Turno.auto_id = Auto.id',
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
			'conditions'=> $_conditions,
			'order' => array('Turno.hora_inicio' => 'asc'),
			'group'	=> array('Turno.hora_inicio', 'Turno.hora_fin')
		));
	}

	public function getListByUbicacion($turno_id, $concesionaria_id, $day, $month, $fields = array('Turno.id', 'Modelo.title')){
		$this->id = $turno_id;
		$inicio = $this->field('hora_inicio');
		$fin = $this->field('hora_fin');
		
		return $this->find('list', array(
			'fields'	=> $fields,
			'joins'		=> array(
				array(
					'table' 		=> 'autos',
					'alias' 		=> 'Auto',
					'type'			=> 'inner',
					'conditions' 	=> array(
						'Turno.auto_id = Auto.id',
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
			'conditions'=>array(
				'Turno.status' 				=> false,
				'Turno.hora_inicio'			=> $inicio,
				'Turno.hora_fin'			=> $fin,
				'DAY(Turno.fecha)'			=> $day,
				'MONTH(Turno.fecha)'		=> $month,
				'Turno.concesionaria_id'	=> $concesionaria_id
			),
			'order' => array('Modelo.title' => 'asc'),
			'group' => array('Modelo.id')
		));
	}
}
