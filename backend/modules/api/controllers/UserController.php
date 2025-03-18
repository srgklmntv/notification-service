<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\Controller;
use backend\modules\api\models\User;
use backend\modules\api\models\Subscription;

class UserController extends Controller
{
    public function actionCreate()
    {
        $data = Yii::$app->request->post();

        $user = new User();
        $user->telegram_id = $data['telegram_id'];
        $user->username = $data['name'] ?? null;

        if (!$user->save()) {
            return ['success' => false, 'errors' => $user->errors];
        }

        return ['success' => true, 'user_id' => $user->id];
    }

    public function actionSubscribe()
    {
        $data = Yii::$app->request->post();

        $subscription = new Subscription();
        $subscription->user_id = $data['user_id'];
        $subscription->resource_id = $data['resource_id'];

        if (!$subscription->save()) {
            return ['success' => false, 'errors' => $subscription->errors];
        }

        return ['success' => true];
    }
}