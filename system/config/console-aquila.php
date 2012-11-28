<?php

    return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'aCalendar',
        'preload'=>array('log'),
        'import'=>array(
            'application.models.*',
            'application.components.*',
        ),
        'modules'=>array(),
        'components'=>array(
            'db'=>array(
                'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/acalendar.db',
            ),
        ),
    );
