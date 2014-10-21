<?php

class TestappSchema extends CakeSchema {

	
public function before($event = array()) {
			return true;
		}
	
		public function after($event = array()) {
		}
public $kids = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),'age' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'adult_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'mom' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));public $adults = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));public $toys = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));public $toys_kids = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'kid_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'toy_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));}