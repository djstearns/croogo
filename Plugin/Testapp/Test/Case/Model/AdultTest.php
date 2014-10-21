<?php
App::uses('Adult', 'Testapp.Model');

/**
 * Adult Test Case
 *
 */
class AdultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.testapp.adult',
		'plugin.testapp.kid',
		'plugin.testapp.toy',
		'plugin.testapp.toys_kid'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adult = ClassRegistry::init('Testapp.Adult');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adult);

		parent::tearDown();
	}

}
