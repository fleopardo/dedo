<?php
App::uses('Concesionaria', 'General.Model');

/**
 * Concesionaria Test Case
 *
 */
class ConcesionariaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.concesionaria',
		'plugin.general.auto',
		'plugin.general.turno'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Concesionaria = ClassRegistry::init('General.Concesionaria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Concesionaria);

		parent::tearDown();
	}

}
