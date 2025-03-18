<?php

namespace backend\modules\api\services;

use Yii;
use yii\httpclient\Client;

class TelegramService
{
    private static $botToken = '8079562630:AAEAJHL7gpE_ikZfsj3b-OcdjjG35IsDIYA';

    public static function sendMessage($chatId, $message)
    {
        $url = "https://api.telegram.org/bot" . self::$botToken . "/sendMessage";

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($url)
            ->setData([
                'chat_id' => $chatId,
                'text' => $message,
            ])
            ->send();

        return $response->isOk;
    }
}