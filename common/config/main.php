<?php
use yii\swiftmailer\Mailer;
use yii\db\Connection;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'Solider',
    'language' => 'vi',
    'timeZone'   => 'Asia/Ho_Chi_Minh',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat'        => 'php:d/m/Y',
            'datetimeFormat'    => 'php:d/m/Y G:i',
            'timeFormat'        => 'php:G:i:s',
            'locale'            => 'vi_VN',
            'defaultTimeZone'   => 'Asia/Ho_Chi_Minh',
            'currencyCode'      => 'đ',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'baseUrl' => '/',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'levels' => YII_DEBUG ? ['warning', 'error', 'debug'] : ['error'],
                    'except' => ['yii\web\HttpException*'],
                    'class' => 'common\components\DbTarget',
                    'logVars' => [],
                ]
            ]
        ],
        'db' => [
            'class' => Connection::class,
            'dsn' => 'mysql:host=127.0.0.1;dbname=solider',
            'username' => 'root',
            'password' => ''
        ],
        'mailer' => [
            'class' => Mailer::class,
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true
        ]
    ],
];
