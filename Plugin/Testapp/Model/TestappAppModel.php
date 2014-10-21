<?php

App::uses('AppModel', 'Model');
App::Uses('SessionComponent', 'Controller/Console');

/**
 * Testapp App Model
 *
 * @category Testapp.Model
 * @package  Croogo.Testapp.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class TestappAppModel extends AppModel {
	public function currentUser() {
	  	$user = SessionComponent::read('Auth.User.id');
	  return array('id'=>$user); # Return the complete user array
	}

}
