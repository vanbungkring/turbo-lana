<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	
	),

	// application components
	'components'=>array(
		'memCache' => array(
            'class'=>'system.caching.CMemCache',
            //'useMemcached'=>true,
            'servers'=>array(
                array(
                    'host'=>'127.0.0.1',
                    'port'=>11211,
                    'weight'=>100,
                ),
            ),
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// uncomment the following to use a MySQL database
		
		'db'=>CMap::mergeArray(include dirname(__FILE__) . '/db.php',array(
			// 'schemaCacheID'=>'memCache',
			// 'queryCacheID'=>'memCache',
			// 'schemaCachingDuration'=>'3600',
		)),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'mailgun' => array(
            'class' => 'application.extensions.php-mailgun.MailgunYii',
            'domain' => 'kiviads.net',
            'key' => 'key-0wztik6tn-zbm1gkcv1h95jh08m1aiu3',
            'tags' => array(), // You may also specify some Mailgun parameters
            'enableTracking' => false,
            'fromAddress'=>'support@kiviads.net',
            'fromName'=>'Suport kiviads',
        ),
	),

	'behaviors'=>array(
	    'runEnd'=>array(
	        'class'=>'application.components.WebApplicationEndBehavior',
	    ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>include dirname(__FILE__) . '/params.php'
);