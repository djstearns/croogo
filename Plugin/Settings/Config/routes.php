<?php

CroogoRouter::connect('/admin', array(
	'admin' => true, 'plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'
));

CroogoRouter::connect('/client', array(
	'client' => true, 'plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'
));
