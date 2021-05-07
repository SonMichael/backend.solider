<?php

namespace api\components;

use Yii;
use yii\rest\Controller;
use yii\filters\Cors;

abstract class RestController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        var_dump(1);
        die;
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => []
            ]
        ];
        return $behaviors;
    }

}
