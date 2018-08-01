<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii_test1',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],

    'bootstrap' => ['debug', 'gii'],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'traceLine' => '<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>',
            // uncomment and adjust the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
        ],

        'gii' => [
            'class' => 'yii\gii\Module',
        ],
        // ...
    ],

    //   'bootstrap' => ['debug'],

    //   'modules' => [
    //       'debug' => [
//            'class' => 'yii\debug\Module',
    //           // uncomment and adjust the following to add your IP if you are not connecting from localhost.
    //           'allowedIPs' => ['127.0.0.1', '::1'],
    //      ],
    //   ], ﻿
];
