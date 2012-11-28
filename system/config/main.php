<?php

    // uncomment the following to define a path alias
    // Yii::setPathOfAlias('local','path/to/local-folder');

    return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'defaultController' => 'index',
        'name'=>'aCalendar',
        'preload'=>array('log'),
        'import'=>array(
            'application.models.*',
            'application.forms.*',
            'application.components.*',
        ),
        'modules'=>array(
            
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'pharazon',
            ),
            ),
        'components'=>array(
            'user'=>array(
                'allowAutoLogin' => true,
                'loginUrl' => array('login'),
            ),
            'urlManager'=>array(
                'urlFormat'      => 'path',
                'showScriptName' => false,
                'rules'          => array(
                    'login' => 'index/login',
                    '<controller:\w+>/<action:\w+>/*'        => '<controller>/<action>',
                ),
            ),
            'db'=>array(),
            /*
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=testdrive',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ),
            */
            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'index/error',
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                    ),
                    array(
                        'class'=>'CWebLogRoute',
                    ),
                ),
            ),
        ),
        // using Yii::app()->params['paramName']
        'params'=>array(
            'adminEmail'=>'jakub@mrowiec.org',
        ),
    );
