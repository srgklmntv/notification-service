<?php

namespace console\commands;

use Yii;
use yii\console\Controller;
use backend\modules\api\models\Notification;
use backend\modules\api\services\NotificationService;

class ResendFailedNotificationsCommand extends Controller
{
    public function actionRun()
    {
        $failedNotifications = Notification::find()
            ->where(['status' => 'failed'])
            ->all();

        foreach ($failedNotifications as $notification) {
            NotificationService::sendNotification($notification);
        }

        echo "Повторная отправка завершена.\n";
    }
}