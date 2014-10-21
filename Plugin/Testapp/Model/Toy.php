<?php
App::uses('TestappAppModel', 'Testapp.Model');
/**
 * Toy Model
 *
 * @property Kid $Kid
 */
class Toy extends TestappAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array('AuditLog.Auditable'
     );

	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**/
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Kid' => array(
			'className' => 'Kid',
			'joinTable' => 'toys_kids',
			'foreignKey' => 'toy_id',
			'associationForeignKey' => 'kid_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
