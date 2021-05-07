<?php


namespace common\components;

use Yii;

class Logger extends \yii\log\Logger
{
    const LEVEL_DEBUG = 0x10;
    const LOG_API_CATEGORY = "API";
    const LOG_RISK_CATEGORY = "RISK";

    public static function getLevelName($level)
    {
        static $levels = [
            self::LEVEL_ERROR => 'error',
            self::LEVEL_WARNING => 'warning',
            self::LEVEL_DEBUG => 'debug',
        ];

        return isset($levels[$level]) ? $levels[$level] : 'unknown';
    }

    public static function debug($message)
    {
        Yii::$app->log->logger->log($message, self::LEVEL_DEBUG);
    }

    public static function error($message, $category = 'API')
    {
        Yii::error($message, $category);
    }
}
