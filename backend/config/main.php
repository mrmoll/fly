<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
    ],
    "aliases" => [
        "@mdm/admin" => "@vendor/mdmsoft/yii2-admin",
    ],
    'language' => 'zh-CN',
    'homeUrl'=>'/admin',
    'components' => [
        'request'=>[
            'baseUrl'=>'/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            "enableStrictParsing" => false,
            'showScriptName' => false,
            "suffix" => "",
            'rules' => [
                '<controller:\w+>/<id:\d+>'=>"<controller>/view",
                '<controller:\w+>/<action:\w+>'=>"<controller>/<action>"
            ],
        ],
        'authManager' => [
            "class" => 'yii\rbac\DbManager', //这里记得用单引号而不是双引号
        ],
       
    ],
    
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action
            //controller/action
            'debug/*',
            'gii/*',
            'site/index',
            '*'
        ]
    ],
    
    'params' => $params,
];
