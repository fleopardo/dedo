<?php
// 	/**
// 	 * Cache Attachments
// 	 */
//     $cacheConfig = array(
//         'duration' => '+1 hour',
//         'path' => CACHE.'queries',
//         'engine' => 'File',
//     );
// 	Cache::config('attachmentable', $cacheConfig);
   
	
	// Menu de navegación del Admin.
	CroogoNav::add('emails', array(
		'title' => __('Emails'),
		'url' => array(
				'plugin' => 'emails',
				'admin' => true,
				'controller' => 'EmailsQueues',
				'action' => 'index',
		),
		'access' => array('admin'),
		'weight' => 50,
		'children' => array(
			'list_animals' => array(
				'title' => __('Listado'),
				'url' => array(
						'plugin' => 'emails',
						'admin' => true,
						'controller' => 'EmailsQueues',
						'action' => 'index',
				),
				'access' => array('admin'),
				'weight' => 1,
			),
			'add_attachments' => array(
				'title' => __('Nuevo Email'),
				'url' => array(
						'plugin' => 'emails',
						'admin' => true,
						'controller' => 'EmailsQueues',
						'action' => 'add',
				),
				'access' => array('admin'),
				'weight' => 2,
				//'htmlAttributes' => array('class' => 'separator'),
			),
			'templates' => array(
				'title' => __('Templates'),
				'url' => array(
					'plugin' => 'emails',
					'admin' => true,
					'controller' => 'EmailsTemplates',
					'action' => 'index',
				),
				'access' => array('admin'),
				'weight' => 15,
				'children' => array(
					'index' => array(
						'title' => __('Listado'),
						'url' => array(
							'plugin' => 'emails',
							'admin' => true,
							'controller' => 'EmailsTemplates',
							'action' => 'index',
						),
						'access' => array('admin'),
						'weight' => 1,
					),
					'add_new' => array(
						'title' => __('nuevo'),
						'url' => array(
							'plugin' => 'emails',
							'admin' => true,
							'controller' => 'EmailsTemplates',
							'action' => 'add',
						),
						'access' => array('admin'),
						'weight' => 2,
					),
				)
			),
			'variables' => array(
				'title' => __('Variables'),
				'url' => array(
					'plugin' => 'emails',
					'admin' => true,
					'controller' => 'EmailsVariables',
					'action' => 'index',
				),
				'access' => array('admin'),
				'weight' => 16,
				'children' => array(
					'index' => array(
						'title' => __('Listado'),
						'url' => array(
							'plugin' => 'emails',
							'admin' => true,
							'controller' => 'EmailsVariables',
							'action' => 'index',
						),
						'access' => array('admin'),
						'weight' => 1,
					),
					'add_new' => array(
						'title' => __('nuevo'),
						'url' => array(
							'plugin' => 'emails',
							'admin' => true,
							'controller' => 'EmailsVariables',
							'action' => 'add',
						),
						'access' => array('admin'),
						'weight' => 2,
					),
				)
			),
			'senders' => array(
				'title' => __('Senders'),
				'url' => array(
					'plugin' => 'emails',
					'admin' => true,
					'controller' => 'EmailsSenders',
					'action' => 'index',
				),
				'access' => array('admin'),
				'weight' => 17,
				'children' => array(
					'index' => array(
						'title' => __('Listado'),
						'url' => array(
							'plugin' => 'emails',
							'admin' => true,
							'controller' => 'EmailsSenders',
							'action' => 'index',
						),
						'access' => array('admin'),
						'weight' => 1,
					),
					'add_new' => array(
						'title' => __('nuevo'),
						'url' => array(
							'plugin' => 'emails',
							'admin' => true,
							'controller' => 'EmailsSenders',
							'action' => 'add',
						),
						'access' => array('admin'),
						'weight' => 2,
					),
				)
			)
		)
	));
	
// // 	Relación con BlogPost para los Attachments.
// 	$_User_belongsTo = array(
// 		'Municipality' => array(
//             'className' => 'Animals.Municipality'
//         ),
//         'VeterinaryCollege' => array(
//         	'className'	=> 'Animals.VeterinaryCollege'
//         )
// 	);
// 	Extended::hookRelationship('User','belongsTo',$_User_belongsTo);
	
// 	Extended::hookAdminTab('User/admin_add', 'Related To', 'Animals.relatedto', array('model' => 'User'));
// 	Extended::hookAdminTab('User/admin_edit', 'Related To', 'Animals.relatedto', array('model' => 'User'));	
	
?>