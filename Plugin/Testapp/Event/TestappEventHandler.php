<?php

App::uses('CakeEventListener', 'Event');

/**
 * Facebook Event Handler
 *
 * @category Event
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class TestappEventHandler extends Object implements CakeEventListener {

/**
 * implementedEvents
 *
 * @return array
 */
    public function implementedEvents() {
		/*
        return array(
			'Controller.Users.adminLoginSuccessful' => array(
				'callable' => 'onAdminLoginSuccessful',
			),
			'Helper.Layout.beforeFilter' => array(
				'callable' => 'onLayoutBeforeFilter',
			),
			'Helper.Layout.afterFilter' => array(
				'callable' => 'onLayoutAfterFilter',
			),
		);
        */
	}


/**
 * onLayoutBeforeFilter
 *
 * @param CakeEvent $event
 * @return void
 */
	public function onLayoutBeforeFilter($event) {
		$search = 'This is the content of your block.';
		$event->data['content'] = str_replace(
			$search,
			'<p style="font-size: 16px; color: green">' . $search . '</p>',
			$event->data['content']
		);
	}

/**
 * onLayoutAfterFilter
 *
 * @param CakeEvent $event
 * @return void
 */
	public function onLayoutAfterFilter($event) {
		if (strpos($event->data['content'], 'This is') !== false) {
			$event->data['content'] .= '<blockquote>This is added by FacebookEventHandler::onLayoutAfterFilter()</blockquote>';
		}
	}

}
