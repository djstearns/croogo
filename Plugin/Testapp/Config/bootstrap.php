<?php
/**
 * Routes
 *
 * Testapp_routes.php will be loaded in main app/config/routes.php file.
 */
Croogo::hookRoutes('Testapp');

/**
 * Behavior
 *
 * This plugin's Testapp behavior will be attached whenever Node model is loaded.
 */
//Croogo::hookBehavior('Node', 'Testapp.Testapp', array());

/**
 * Component
 *
 * This plugin's Testapp component will be loaded in ALL controllers.
 */
//Croogo::hookComponent('*', 'Testapp.Testapp');

/**
 * Helper
 *
 * This plugin's Testapp helper will be loaded via NodesController.
 */
//Croogo::hookHelper('Nodes', 'Testapp.Testapp');

/**
 * Admin menu (navigation) OLD DEFAULT STRING WILL BE APPENDED BELOW:
 */
 /*
CroogoNav::add('extensions.children.Testapp', array(
	'title' => 'Testapp',
	'url' => '#',
	'children' => array(
		'Testapp1' => array(
			'title' => 'Testapp 1',
			'url' => array(
				'admin' => true,
				'plugin' => 'Testapp',
				'controller' => 'Testapp',
				'action' => 'index',
			),
		),
		'Testapp2' => array(
			'title' => 'Testapp 2 with a title that won\'t fit in the sidebar',
			'url' => '#',
			'children' => array(
				'Testapp-2-1' => array(
					'title' => 'Testapp 2-1',
					'url' => '#',
					'children' => array(
						'Testapp-2-1-1' => array(
							'title' => 'Testapp 2-1-1',
							'url' => '#',
							'children' => array(
								'Testapp-2-1-1-1' => array(
									'title' => 'Testapp 2-1-1-1',
								),
							),
						),
					),
				),
			),
		),
		'Testapp3' => array(
			'title' => 'Chooser Testapp',
			'url' => array(
				'admin' => true,
				'plugin' => 'Testapp',
				'controller' => 'Testapp',
				'action' => 'chooser',
			),
		),
		'Testapp4' => array(
			'title' => 'RTE Testapp',
			'url' => array(
				'admin' => true,
				'plugin' => 'Testapp',
				'controller' => 'Testapp',
				'action' => 'rte_Testapp',
			),
		),
	),
));
*/
$Localization = new L10n();

//This will need to be custom also set in the field type

Croogo::mergeConfig('Wysiwyg.actions', array(
	'Testapp/admin_rte_Testapp' => array(
		array(
			'elements' => 'TestappBasic',
			'preset' => 'basic',
		),
		array(
			'elements' => 'TestappStandard',
			'preset' => 'standard',
			'language' => 'ja',
		),
		array(
			'elements' => 'TestappFull',
			'preset' => 'full',
			'language' => $Localization->map(Configure::read('Site.locale')),
		),
		array(
			'elements' => 'TestappCustom',
			'toolbar' => array(
				array('Format', 'Bold', 'Italic'),
				array('Copy', 'Paste'),
			),
			'uiColor' => '#ffe79a',
			'language' => 'fr',
		),
	),
));

/**
 * Admin row action
 *
 * When browsing the content list in admin panel (Content > List),
 * an extra link called 'Testapp' will be placed under 'Actions' column.
 */
 
/* 
Croogo::hookAdminRowAction('Nodes/admin_index', 'Testapp', 'plugin:Testapp/controller:Testapp/action:index/:id');
*/
/* Row action with link options */
/*
Croogo::hookAdminRowAction('Nodes/admin_index', 'Button with Icon', array(
	'plugin:Testapp/controller:Testapp/action:index/:id' => array(
		'options' => array(
			'icon' => 'key',
			'button' => 'success',
		),
	),
));
*/
/* Row action with icon */
/*
Croogo::hookAdminRowAction('Nodes/admin_index', 'Icon Only', array(
	'plugin:Testapp/controller:Testapp/action:index/:id' => array(
		'title' => false,
		'options' => array(
			'icon' => 'picture',
			'tooltip' => array(
				'data-title' => 'A nice and simple action with tooltip',
				'data-placement' => 'left',
			),
		),
	),
));
*/
/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'Testapp' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields to OTHER MODELS if necessary.
 */
 
 /*
Croogo::hookAdminTab('Nodes/admin_add', 'Testapp', 'Testapp.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_edit', 'Testapp', 'Testapp.admin_tab_node');
*/
CroogoNav::add('Testapp', 
			array(
			'title' => 'Testapp',
			'url' => '#',
			'children' => array(
				'adults' => array(
					'title' => 'Adults',
					'url' => '#',
					'children'=> array(
					'List' => array(
							'title' => 'List',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'adults',
								'action' => 'index',
							),
						),
						'Add' => array(
							'title' => 'Add',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'adults',
								'action' => 'add',
							),
						),
					)
				),'kids' => array(
					'title' => 'Kids',
					'url' => '#',
					'children'=> array(
					'List' => array(
							'title' => 'List',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'kids',
								'action' => 'index',
							),
						),
						'Add' => array(
							'title' => 'Add',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'kids',
								'action' => 'add',
							),
						),
					)
				),'toys' => array(
					'title' => 'Toys',
					'url' => '#',
					'children'=> array(
					'List' => array(
							'title' => 'List',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'toys',
								'action' => 'index',
							),
						),
						'Add' => array(
							'title' => 'Add',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'toys',
								'action' => 'add',
							),
						),
					)
				),'toys_kids' => array(
					'title' => 'Toys_kids',
					'url' => '#',
					'children'=> array(
					'List' => array(
							'title' => 'List',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'toys_kids',
								'action' => 'index',
							),
						),
						'Add' => array(
							'title' => 'Add',
							'url' => array(
								'admin' => true,
								'plugin' => 'testapp',
								'controller' => 'toys_kids',
								'action' => 'add',
							),
						),
					)
				),)));