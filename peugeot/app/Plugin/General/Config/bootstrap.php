<?php

CroogoNav::add('general', array(
	'icon' => array('user', 'large'),
	'title' => __('General'),
	'url' => array(
		'admin' => true,
		'plugin' => 'general',
		'controller' => 'turnos',
		'action' => 'index',
	),
	'access' => array('promotora'),
	'weight' => 50,
	'children' => array(
		'concesionarias' => array(
			'title' => __('Concesionarias'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'Concesionarias',
				'action' => 'index',
			),
			'weight' => 10,
		),
		'autos' => array(
			'title' => __('Autos'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'autos',
				'action' => 'index',
			),
			'weight' => 20,
			'children' => array(
				'concesionarias' => array(
					'title' => __('Modelos'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'Modelos',
						'action' => 'index',
					),
					'weight' => 10,
				),
			)
		),
		'turnos' => array(
			'title' => __('Trunos'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'turnos',
				'action' => 'index',
			),
			'access' => array('promotora'),
			'weight' => 30,
		),
	),
));
