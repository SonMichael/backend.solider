<?php

namespace api\components;

class ErrorHandler extends \yii\web\ErrorHandler
{
    protected function convertExceptionToArray($exception)
    {
        return array_merge(parent::convertExceptionToArray($exception), [
            'type' => get_class($exception)
        ]);
    }
}
