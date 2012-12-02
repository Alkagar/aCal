<?php
    class AController extends CController
    {
        public $layout='//layouts/main';

        public function init()
        {
            // set language for application
            Yii::app()->setLanguage('en'); 

        }

        protected function _validateAjax($form, $formName) 
        {
            if(isset($_POST['ajax']) && $_POST['ajax'] === $formName) {
                echo CActiveForm::validate($form);
                Yii::app()->end();
            }
        }
    }
