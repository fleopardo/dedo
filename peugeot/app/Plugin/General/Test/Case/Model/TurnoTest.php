<?php
App::uses('Turno', 'General.Model');

/**
 * Turno Test Case
 *
 */
class TurnoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.turno',
		'plugin.general.auto',
		'plugin.general.concesionaria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Turno = ClassRegistry::init('General.Turno');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Turno);

		parent::tearDown();
	}

}
