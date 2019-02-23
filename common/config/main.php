<?php
return [
    'bootstrap' => ['bootstrap'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'bootstrap' => [
            'class' => '\common\components\BootstrapComponent'
        ],
        'bot' => [
            'class' => \SonkoDmitry\Yii\TelegramBot\Component::class,
            'apiToken' => '660597439:AAF3yo4SYMYS5j4O_-q3rpAT-wW20bacCF8'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
