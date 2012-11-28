<?php

    class IndexController extends AController
    {
        /**
        * Displays the main/index page
        */
        public function actionIndex()
        {
            $this->render('index');
        }

        /**
        * Displays the login page
        */
        public function actionLogin()
        { 
            $form = new FormLogin();
            $formName = get_class($form);

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax'] === $formName) {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST[$formName])) {
                $form->attributes = $_POST[$formName];
                // validate user input and redirect to the previous page if valid
                if($form->validate() && $form->login()) {
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }
            // display the login form
            $this->render('login', array(
                'form' => $form,
                'formName' => $formName,
            ));
        }

        /**
        * Logs out the current user and redirect to homepage.
        */
        public function actionLogout()
        {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
        }

        /**
        * Show error page
        */
        public function actionError() 
        {
            if($error=Yii::app()->errorHandler->error)
            $this->render('error', $error);
        }
    }
