<?php


namespace zafarjonovich\YiiTelegramNotification;

use yii\base\Component;
use zafarjonovich\Telegram\BotApi;
use zafarjonovich\Telegram\MessageBuilder;
use zafarjonovich\Telegram\update\objects\Response;

class TelegramNotificationComponent extends Component
{
    /**
     * @var BotApi $api
     */
    private $api;

    public $bot_token;

    public function init()
    {
        $this->api = new BotApi($this->bot_token);
    }

    public function send($chat_id,array $message)
    {
        $message['chat_id'] = $chat_id;
        $builder = new MessageBuilder($message);

        return new Response(
            $this->api->query(
                $builder->getMethod(),
                $builder->getProperties()
            )
        );
    }

    public function multipleSend(array $chat_ids,array $message)
    {
        $responses = [];

        foreach ($chat_ids as $chat_id) {
            $responses[] = $this->send($chat_id,$message);
        }

        return $responses;
    }
}