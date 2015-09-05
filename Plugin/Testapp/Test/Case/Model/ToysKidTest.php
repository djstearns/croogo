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
