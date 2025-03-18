<?php

namespace backend\modules\api\services;

use Yii;
use backend\modules\api\models\Notification;
use backend\modules\api\models\Subscription;

class NotificationService
{
    public static function sendNotification(Notification $notification)
    {
        $subscribers = Subscription::find()
            ->where(['resource_id' => $notification->resource_id])
            ->with('user')
            ->all();

        if (empty($subscribers)) {
            Yii::warning("Нет подписчиков для ресурса {$notification->resource_id}");
            return;
        }

        foreach ($subscribers as $subscription) {
            $user = $subscription->user;
            if (!$user) {
                continue;
            }

            $message = "🔔 Уведомление от ресурса: *{$notification->resource_id}*\n" .
                       "⚠️ Тип: `{$notification->type}`\n" .
                       "💬 Сообщение: {$notification->message}";

            $success = TelegramService::sendMessage($user->telegram_id, $message);

            if ($success) {
                $notification->status = 'sent';
            } else {
                $notification->status = 'failed';
            }

            $notification->sent_at = date('Y-m-d H:i:s');
            $notification->save();
        }
    }
}