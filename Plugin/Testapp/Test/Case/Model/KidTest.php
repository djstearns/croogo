<?php
App::uses('Kid', 'Testapp.Model');

/**
 * Kid Test Case
 *
 */
class KidTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.testapp.kid',
		'plugin.testapp.adult',
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
		$this->Kid = ClassRegistry::init('Testapp.Kid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Kid);

		parent::tearDown();
	}

}
