<?php
App::uses('ToysKid', 'Testapp.Model');

/**
 * ToysKid Test Case
 *
 */
class ToysKidTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.testapp.toys_kid',
		'plugin.testapp.kid',
		'plugin.testapp.adult',
		'plugin.testapp.toy'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ToysKid = ClassRegistry::init('Testapp.ToysKid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ToysKid);

		parent::tearDown();
	}

}
