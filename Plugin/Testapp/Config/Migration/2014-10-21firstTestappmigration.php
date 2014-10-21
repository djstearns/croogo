<?php

class TestappMigration extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		if ($direction === 'down') {
			return false;
		}
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
public $migration = array(
			'up' => array(
				'create_table' => array('kids' => array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),'age' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'adult_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'mom' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')),'adults' => array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')),'toys' => array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')),'toys_kids' => array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'kid_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'toy_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')),),
			),
			'down' => array(
				'drop_table' => array('kids','adults','toys','toys_kids',
				),
			),
		);}