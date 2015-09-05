<?php

class TestappSchema extends CakeSchema {

	
public function before($event = array()) {
			return true;
		}
	
		public function after($event = array()) {
		}
public $adults = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 255),'homeloc_lat' => array('type'=>'float', 'null' => false, 'default' => NULL),'homeloc_lng' => array('type'=>'float', 'null' => false, 'default' => NULL),'photo' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));public $kids = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'age' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'adult_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'mom' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 255),'attachment_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'birthday' => array('type'=>'datetime', 'null' => false, 'default' => NULL),'blonde' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 1),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));public $toys = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 255),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));public $toys_kids = array('id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),'kid_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'toy_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 11),'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
						'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM'));}