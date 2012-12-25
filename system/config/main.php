<?php

    // uncomment the following to define a path alias
    // Yii::setPathOfAlias('local','path/to/local-folder');

    return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'defaultController' => 'index',
        'name'=>'aCalendar',
        'preload'=>array('log'),

        'sourceLanguage'=>'00',
        'language'=>'en',

        'import'=>array(
            'application.models.*',
            'application.forms.*',
            'application.components.*',
            'application.components.helpers.*',
            'application.extensions.AlkCalendar.*',
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
                    'help' => 'index/help',
                    'home' => 'index/index',
                    'logout' => 'index/logout',
                    'register' => 'index/register',
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
                    //array(
                        //'class'=>'CWebLogRoute',
                    //),
                ),
            ),
        ),
        // using Yii::app()->params['paramName']
        'params'=>array(
            'adminEmail'=>'jakub@mrowiec.org',
            'menu' => array(
                'guest' => array(
                    'menu.home' => '/home',
                    'menu.help' => '/help',
                    'menu.login' => '/login',
                    'menu.register' => '/register',
                ),
                'user' => array(
                    'menu.home' => '/home',
                    'menu.help' => '/help',
                    'menu.logout' => '/logout',

                    'menu.tasks' => '/task',
                    'menu.task-add' => '/task/add', 
                    'menu.types' => '/taskType',
                    'menu.type-add' => '/taskType/add',

                    'menu.calendar' => '/calendar',
                ),
            ),
        ),
    );
