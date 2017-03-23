<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
	'modules' => [
    'admin' => [
        'class' => 'mdm\admin\Module',
        
    ]
    
],

'components' => [    
    'user' => [
        'identityClass' => 'mdm\admin\models\User',
        'loginUrl' => ['admin/user/login'],
    ],
	'authManager' => [
        'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
    ]
],
];
