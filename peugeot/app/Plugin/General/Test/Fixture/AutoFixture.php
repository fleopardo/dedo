<?php
/**
 * AutoFixture
 *
 */
class AutoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'producto' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'color' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'vim' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patentamiento' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'concesionaria_id' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'producto' => 'Lorem ipsum dolor sit amet',
			'color' => 'Lorem ipsum dolor sit amet',
			'vim' => 'Lorem ipsum dolor sit amet',
			'patentamiento' => 'Lorem ipsum dolor sit amet',
			'concesionaria_id' => 1,
			'status' => 1,
			'created' => '2012-12-24 17:58:15',
			'modified' => '2012-12-24 17:58:15'
		),
	);

}
