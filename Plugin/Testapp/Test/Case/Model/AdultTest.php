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
		'plugin.testapp.node',
		'plugin.testapp.user',
		'plugin.testapp.role',
		'plugin.testapp.comment',
		'plugin.testapp.meta',
		'plugin.testapp.taxonomy',
		'plugin.testapp.term',
		'plugin.testapp.vocabulary',
		'plugin.testapp.type',
		'plugin.testapp.types_vocabulary',
		'plugin.testapp.nodes_taxonomy',
		'plugin.testapp.kid'
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
