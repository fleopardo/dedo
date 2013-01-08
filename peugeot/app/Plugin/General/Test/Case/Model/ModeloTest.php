<?php
App::uses('Modelo', 'General.Model');

/**
 * Modelo Test Case
 *
 */
class ModeloTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.modelo',
		'plugin.general.auto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Modelo = ClassRegistry::init('General.Modelo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Modelo);

		parent::tearDown();
	}

}
