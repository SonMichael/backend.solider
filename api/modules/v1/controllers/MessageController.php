<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 5/16/2019
 * Time: 2:22 PM
 */

namespace api\modules\v1\controllers;


use api\components\RestController;

class MessageController extends RestController
{

    public function verbs()
    {
        return [
            'index' => ['GET'],
        ];
    }

    public function actionIndex()
    {
        var_dump(1);
        die;
    }

}