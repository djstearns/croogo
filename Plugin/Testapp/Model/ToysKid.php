<?php
App::uses('TestappAppModel', 'Testapp.Model');
/**
 * ToysKid Model
 *
 * @property Kid $Kid
 * @property Toy $Toy
 */
class ToysKid extends TestappAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'kid_id';

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array('AuditLog.Auditable'
     );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'kid_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'toy_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**/
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Kid' => array(
			'className' => 'Kid',
			'foreignKey' => 'kid_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Toy' => array(
			'className' => 'Toy',
			'foreignKey' => 'toy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
