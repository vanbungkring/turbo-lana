<?php
return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
        // Put front-end settings there
        // (for example, url rules).
		'components'=>array(
			'user'=>array(
                'class'=>'CWebUser',
                'stateKeyPrefix'=>'front',
            ),
			'urlManager'=>array(
				'urlFormat'=>'path',
				'rules'=>array(
					'dashboard'=>'user/dashboard',
					'register'=>'site/registrasi',
					'search'=>'site/result',
					'custom'=>'site/custom',
					'login'=>'site/login',
					'detail/<id:\w+>'=>'site/detail',
					'<controller:\w+>/<id:\d+>'=>'<controller>/view',
					'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
					'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
					),
				),
			),
		)
	);