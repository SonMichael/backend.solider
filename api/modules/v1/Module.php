<?php

namespace api\modules\v1;

use Yii;
use yii\filters\RateLimiter;
use api\components\IpLimiter;

/**
 * Class Module
 * @package api\modules\v1
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'api\modules\v1\controllers';

    public function init()
    {

        parent::init();

        // custom initialization code goes here
    }
}
