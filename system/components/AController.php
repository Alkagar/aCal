<?php
    class AController extends CController
    {
        public $layout='//layouts/main';

        public function init()
        {
            // set language for application
            Yii::app()->setLanguage('en'); 

        }
    }
