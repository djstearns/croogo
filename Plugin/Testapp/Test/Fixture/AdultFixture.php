<?php
/**
 * AdultFixture
 *
 */
class AdultFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'homeloc_lat' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'homeloc_lng' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'photo' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'homeloc_lat' => 1,
			'homeloc_lng' => 1,
			'photo' => 1
		),
	);

}
