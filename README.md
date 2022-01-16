# Yii telegram notification

Assalomu aleykum. These components will help you send message notifications to telegram chats via telegram bots on your Yii application.

-----
## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require zafarjonovich/yii-telegram-notification
```

or add

```
"zafarjonovich/yii-telegram-notification": "*"
```

to the require section of your `composer.json` file.

------
## Configuration

Add your app/config.php this component

```php
<?php

$config = [
 ...
 'components' => [
 ...
	  'telegramNotification' => [
            'class' => \zafarjonovich\YiiTelegramNotification\YiiTelegramNotificationComponent::class,
            'bot_token' => 'BOT_TOKEN_HERE'
        ],

];

?>


```

------
## Usage


```php
<?php

// Sending text message

\Yii::$app->telegramNotification->send('chat_id',[
    'text' => "Hello world"
]);

// Sending photo message, this example text will be comment of photo

\Yii::$app->telegramNotification->send('chat_id',[
    'photo' => "PHOTO_URL",
    'text' => "Hello world",
]);


// Sending video message, this example text will be comment of video

\Yii::$app->telegramNotification->send('chat_id',[
    'video' => "VIDEO_URL",
    'text' => "Hello world",
]);

// Send message multiple chats

\Yii::$app->telegramNotification->multipleSend(['chat_id1','chat_id2'],[
    'text' => "Hello world"
]);


?>


```