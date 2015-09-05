<?php
/**
 * KidFixture
 *
 */
class KidFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'age' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'adult_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'mom' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'attachment_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'birthday' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'blonde' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
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
			'age' => 1,
			'adult_id' => 1,
			'mom' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'attachment_id' => 1,
			'birthday' => '2015-08-29 01:47:42',
			'blonde' => 1
		),
	);

}
