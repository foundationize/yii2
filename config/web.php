<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3Z06IjksE_XzIQAjd39FYHKDCVLG4HUu',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),           
        // http://www.yiiframework.com/doc-2.0/guide-runtime-routing.html#using-pretty-urls
        // http://www.joshuawinn.com/yii-clean-seo-friendly-urls-for-pages/
        // Make sure mod_rewrite enabled: http://askubuntu.com/questions/48362/how-to-enable-mod-rewrite-in-apache
        'urlManager' => [
            'hostInfo' => 'http://yii2.foundationize.com', //returned by Url::home(true)            
            'enablePrettyUrl' => true,
            'showScriptName' => false,                        
            'rules' => [                                                
                'contact' => 'site/contact',
                // insert your page routes here
            ],
        ],  
        
    ],    
    'aliases' => [
            // Site-wide var's
            '@site_name' =>  'Demo: Yii2 + Foundation',
            '@site_tagline' => 'Start your new project using Yii2 with Foundation 6',
            // Paths    
            // These paths are relative to '/web'
            // note: trailing slashes are removed automatically (by Yii)
            //'@uploadsdir' => '/uploads'
        ],    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => [$_SERVER['REMOTE_ADDR']], // always allow on current server
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => [$_SERVER['REMOTE_ADDR']], // always allow on current server
    ];
}

return $config;
