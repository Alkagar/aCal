<?php
    class AlkCalendar extends CWidget
    {

        public function init()
        { 
            $assetDir = dirname(__FILE__).'/assets';
            $cs = Yii::app()->getClientScript();
            $cs->registerScriptFile(
                Yii::app()->assetManager->publish($assetDir.'/AlkCalendar.js'),
                CClientScript::POS_HEAD
            );
            $cs->registerCssFile(
                Yii::app()->assetManager->publish($assetDir.'/AlkCalendar.css')
            );
            $cs->registerCoreScript('jquery');
            $cs->registerCoreScript('jquery.ui');

            $tasks = User::model()->findByPk(Yii::app()->user->id)->tasks;

            $this->render('calendar', array(
                'tasks' => $tasks,
                ));
        }

        public function run() 
        { }
    }
