<?php

use yii\caching\FileCache;
use yii\rest\UrlRule;
use yii\log\FileTarget;
use yii\web\JsonParser;
use yii\helpers\ArrayHelper;
use api\modules\v1\models\User;
use api\modules\v1\Module as V1Module;
use modules\users\Bootstrap as UserBootstrap;

$params = ArrayHelper::merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/params.php'
);

return [
    'id' => 'api',
    'language' => 'vi', // en, ru
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'defaultRoute' => 'v1/default',
    'modules' => [
        'v1' => [
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'bootstrap' => [
        'log',
        [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
                'application/xml' => \yii\web\Response::FORMAT_XML,
                'application/x-www-form-urlencoded' => \yii\web\Response::FORMAT_JSON,
            ],
        ],
    ],
    'params' => $params,
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'fM2hT237NcmHV8A4yNvPBa8J8s0iMLa8',
            'csrfCookie' => [
                'name' => '_csrf',
                'path' => '/',
                'domain' => ".api.solider.local",
            ],
        ],
        'response' => [
            'class' => \yii\web\Response::className(),
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
//                    $response->statusCode = 200;
                }
            },
        ],
        'errorHandler' => [
            'class' => \api\components\ErrorHandler::className(),
        ],
    ],

];
