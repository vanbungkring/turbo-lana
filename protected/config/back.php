<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
        'aliases' => array(
        	'xupload' => 'ext.xupload',
        ),
		'components'=>array(
			'urlManager'=>array(
				'urlFormat'=>'path',
				'rules'=>array(
						'<controller:\w+>/<id:\d+>'=>'<controller>/view',
						'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
						'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
					),
				),
			),
		)
	);