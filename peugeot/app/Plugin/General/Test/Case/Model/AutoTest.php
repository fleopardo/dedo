<?php
App::uses('Auto', 'General.Model');

/**
 * Auto Test Case
 *
 */
class AutoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.auto',
		'plugin.general.concesionaria',
		'plugin.general.turno'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Auto = ClassRegistry::init('General.Auto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Auto);

		parent::tearDown();
	}

}
