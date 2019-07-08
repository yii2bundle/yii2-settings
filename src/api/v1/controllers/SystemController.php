<?php

namespace yii2bundle\settings\api\v1\controllers;

use yii2lab\rest\domain\rest\ActiveControllerWithQuery as Controller;
use yii2lab\rest\domain\rest\IndexActionWithQuery;
use yii2lab\rest\domain\rest\ViewActionWithQuery;
use yii2rails\extension\web\helpers\Behavior;

class SystemController extends Controller
{

	public $service = 'settings.system';

	public function behaviors()
    {
        return [
            Behavior::cors(),
            //Behavior::auth(),
        ];
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexActionWithQuery::class,
                'serviceMethod' => 'all',
            ],
            'view' => [
                'class' => ViewActionWithQuery::class,
            ],
        ];
    }

}