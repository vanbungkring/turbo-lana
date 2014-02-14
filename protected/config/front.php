<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
        // Put front-end settings there
        // (for example, url rules).
		'components'=>array(
			'urlManager'=>array(
				'urlFormat'=>'path',
				'rules'=>array(
					'registrasi'=>'site/registrasi',
					'search-result'=>'site/result',
					'user'=>'site/user',
					'detail'=>'site/detail',
					'<controller:\w+>/<id:\d+>'=>'<controller>/view',
					'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
					'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
					),
				),
			),
		)
	);