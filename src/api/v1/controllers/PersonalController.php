<?php

namespace yii2bundle\settings\api\v1\controllers;

use yii2lab\rest\domain\rest\Controller;
use yii2rails\extension\web\helpers\Behavior;

class PersonalController extends Controller
{
	public $service = 'settings.personal';

    public function behaviors()
    {
        return [
            Behavior::cors(),
            Behavior::auth(),
        ];
    }

    public function actionView()
    {
        return \App::$domain->settings->personal->oneSelf();
    }

    public function actionUpdate()
    {
        \Yii::$app->response->setStatusCode(204);
        $post = \Yii::$app->request->post();
        \App::$domain->settings->personal->updateSelf($post);
    }

}