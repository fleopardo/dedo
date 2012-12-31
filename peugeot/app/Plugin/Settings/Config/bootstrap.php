<?php

Croogo::hookComponent('*', 'Settings.Settings');

CroogoNav::add('settings', array(
	'icon' => array('cog', 'large'),
	'title' => __('Settings'),
	'url' => array(
		'admin' => true,
		'plugin' => 'settings',
		'controller' => 'settings',
		'action' => 'prefix',
		'Site',
	),
	'weight' => 60,
	'children' => array(
		'site' => array(
			'title' => __('Site'),
			'url' => array(
				'admin' => true,
				'plugin' => 'settings',
				'controller' => 'settings',
				'action' => 'prefix',
				'Site',
			),
			'weight' => 10,
		),
	),
));
