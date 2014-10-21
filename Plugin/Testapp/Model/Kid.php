<?php
App::uses('TestappAppModel', 'Testapp.Model');
/**
 * Kid Model
 *
 * @property Adult $Adult
 * @property Toy $Toy
 */
class Kid extends TestappAppModel {

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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Adult' => array(
			'className' => 'Adult',
			'foreignKey' => 'adult_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Mom' => array(
			'className' => 'Adult',
			'foreignKey' => 'mom',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Toy' => array(
			'className' => 'Toy',
			'joinTable' => 'toys_kids',
			'foreignKey' => 'kid_id',
			'associationForeignKey' => 'toy_id',
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
