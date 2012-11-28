<?php
    // aquila config - zenbook local config
    return array(
        'components'=>array(
            'db'=>array(
                'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/acalendar.db',
            ),
        ),
    );
