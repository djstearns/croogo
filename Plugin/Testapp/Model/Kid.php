<?php
App::uses('TestappAppModel', 'Testapp.Model');
/**
 * Kid Model
 *
 * @property Adult $Adult
 * @property Attachment $Attachment
 * @property Toy $Toy
 */
class Kid extends TestappAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'age';

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
		'age' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'adult_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mom' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'attachment_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birthday' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blonde' => array(
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
		'Adult' => array(
			'className' => 'Adult',
			'foreignKey' => 'adult_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Attachment' => array(
			'className' => 'FileManager.Attachment',
			'foreignKey' => 'attachment_id',
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
		),
		'Attachment_id' => array(
			'className' => 'FileManager.Attachment',
			'foreignKey' => 'attachment_id',
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
