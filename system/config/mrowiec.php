<?php
    // mrowiec.org config
    return array(
        'components'=>array(
            'db'=>array(
                'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/acalendar.db',
            ),
            'request' => array(
               'baseUrl' => '/works/aCal',
               ),
        ),
    );
