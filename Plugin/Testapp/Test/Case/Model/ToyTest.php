<?php
App::uses('Toy', 'Testapp.Model');

/**
 * Toy Test Case
 *
 */
class ToyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.testapp.toy',
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
		'plugin.testapp.toys_kid'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Toy = ClassRegistry::init('Testapp.Toy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Toy);

		parent::tearDown();
	}

}
