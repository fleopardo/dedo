<?php
/**
 * TurnoFixture
 *
 */
class TurnoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'sexo' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'licencia' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'vencimiento' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'provincia' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'localidad' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'telefono' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'nacimiento' => array('type' => 'date', 'null' => false, 'default' => null),
		'auto_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'concesionaria_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'hora_inicio' => array('type' => 'time', 'null' => false, 'default' => null),
		'hora_fin' => array('type' => 'time', 'null' => false, 'default' => null),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => null),
		'finalizado' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'sexo' => 1,
			'licencia' => 'Lorem ipsum dolor sit amet',
			'vencimiento' => '2012-12-24 18:00:28',
			'provincia' => 'Lorem ipsum dolor sit amet',
			'localidad' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem ipsum dolor sit amet',
			'nacimiento' => '2012-12-24',
			'auto_id' => 1,
			'concesionaria_id' => 1,
			'hora_inicio' => '18:00:28',
			'hora_fin' => '18:00:28',
			'fecha' => '2012-12-24',
			'finalizado' => 1,
			'status' => 1,
			'created' => '2012-12-24 18:00:28',
			'modified' => '2012-12-24 18:00:28'
		),
	);

}
