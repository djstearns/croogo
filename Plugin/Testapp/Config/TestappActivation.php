<?php
/**
 * Testapp Activation
 *
 * Activation class for Testapp plugin.
 * This is optional, and is required only if you want to perform tasks when your plugin is activated/deactivated.
 *
 * @package  Croogo
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class TestappActivation {

/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeActivation(&$controller) {
		return true;
	}

/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onActivation(&$controller) {
		$controller->Croogo->addAco('Testapp/Testapp/admin_index'); // ProjectController::admin_index()
		$controller->Croogo->addAco('Testapp/Testapp/index', array('registered', 'public')); // ProjectController::index()
		
		// ACL: set ACOs with permissions
		App::uses('ConnectionManager', 'Model');
		
		//$db = ConnectionManager::getDataSource('default');
		//$db->rawQuery('CREATE TABLE IF NOT EXISTS adults (id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar (255),homeloc_lat decimal (9,6),homeloc_lng decimal (9,6),photo int (11));CREATE TABLE IF NOT EXISTS kids (id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, age int (11),adult_id int (11),mom int (11),name varchar (255),attachment_id int (11),birthday datetime,blonde int (1));CREATE TABLE IF NOT EXISTS toys (id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar (255));CREATE TABLE IF NOT EXISTS toys_kids (id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, kid_id int (11),toy_id int (11));');
		
		App::uses('ShellDispatcher', 'Console');
		App::uses('BakeShell', 'Console/Command');
		App::uses('Shell', 'Console');
		App::uses('AppShell', 'Console/Command');
		App::uses('Model', 'Model');
		
		$oldprefix = Configure::read('Routing.prefixes');
		Configure::write('Routing.prefixes', array('admin'));
		
		$thisshell = new Shell();
		$thisshell->initialize();
		
		$thisshell->dispatchShell('Bake model Adults --plugin Testapp --theme project -q');$thisshell->dispatchShell('Bake model Kids --plugin Testapp --theme project -q');$thisshell->dispatchShell('Bake model Toys --plugin Testapp --theme project -q');$thisshell->dispatchShell('Bake model Toys_kids --plugin Testapp --theme project -q');$thisshell->dispatchShell('Bake controller Adults --plugin Testapp --theme project --admin -q');$thisshell->dispatchShell('Bake controller Kids --plugin Testapp --theme project --admin -q');$thisshell->dispatchShell('Bake controller Toys --plugin Testapp --theme project --admin -q');$thisshell->dispatchShell('Bake controller Toys_kids --plugin Testapp --theme project --admin -q');$thisshell->dispatchShell('Bake view Adults --plugin Testapp --theme project -q');$thisshell->dispatchShell('Bake view Kids --plugin Testapp --theme project -q');$thisshell->dispatchShell('Bake view Toys --plugin Testapp --theme project -q');$thisshell->dispatchShell('Bake view Toys_kids --plugin Testapp --theme project -q');
		
		Configure::write('Routing.prefixes', $oldprefix);
		
		App::uses('CroogoPlugin', 'Extensions.Lib');
		$CroogoPlugin = new CroogoPlugin();
		//$CroogoPlugin->migrate('Testapp');
		
		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: add an Testapp link
		$mainMenu = $this->Link->Menu->findByAlias('main');
		$this->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $mainMenu['Menu']['id'],
			),
		));
		$this->Link->save(array(
			'menu_id' => $mainMenu['Menu']['id'],
			'title' => 'Testapp',
			'link' => 'plugin:Testapp/controller:Testapp/action:index',
			'status' => 1,
			'class' => 'Testapp',
		));
		
	}

/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeDeactivation(&$controller) {
		return true;
	}

/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onDeactivation(&$controller) {
		App::uses('CroogoPlugin', 'Extensions.Lib');
		$CroogoPlugin = new CroogoPlugin();
		$CroogoPlugin->unmigrate('Testapp');
		// ACL: remove ACOs with permissions
		$controller->Croogo->removeAco('Testapp'); // TestappController ACO and it's actions will be removed

		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: delete Testapp link
		$link = $this->Link->find('first', array(
			'joins' => array(
				array(
					'table' => 'menus',
					'alias' => 'JoinMenu',
					'conditions' => array(
						'JoinMenu.alias' => 'main',
					),
				),
			),
			'conditions' => array(
				'Link.link' => 'plugin:Testapp/controller:Testapp/action:index',
			),
		));
		if (empty($link)) {
			return;
		}
		$this->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $link['Link']['menu_id'],
			),
		));
		if (isset($link['Link']['id'])) {
			$this->Link->delete($link['Link']['id']);
		}
	}
}
