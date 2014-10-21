<?php
App::uses('TestappAppModel', 'Testapp.Model');
/**
 * Adult Model
 *
 * @property Kid $Kid
 */
class Adult extends TestappAppModel {

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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Kid' => array(
			'className' => 'Kid',
			'foreignKey' => 'adult_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
