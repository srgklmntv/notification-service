<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\Controller;
use backend\modules\api\models\Notification;
use backend\modules\api\services\NotificationService;

class NotificationController extends Controller
{
    public function actionCreate()
    {
        $data = Yii::$app->request->post();

        $notification = new Notification();
        $notification->resource_id = $data['resource_id'];
        $notification->type = $data['type'];
        $notification->message = $data['message'];

        if (!$notification->save()) {
            return ['success' => false, 'errors' => $notification->errors];
        }

        NotificationService::sendNotification($notification);

        return ['success' => true, 'notification_id' => $notification->id];
    }
}