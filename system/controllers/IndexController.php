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
            $form = new FormUser();
            $form->setScenario('login');
            $formName = get_class($form);

            $this->_validateAjax($form, $formName);

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
        * Displays the register page
        */
        public function actionRegister()
        { 
            $form = new FormUser();
            $form->setScenario('register');
            $formName = get_class($form);

            $this->_validateAjax($form, $formName);

            if(isset($_POST[$formName])) {
                $form->attributes = $_POST[$formName];
                if($form->validate()) {
                    $user = new User();
                    $user->attributes = $_POST[$formName];
                    $user->password = sha1($form->password);
                    if($user->save()) {
                        $this->redirect('/login');
                    } else {
                        Yii::app()->user->setFlash('notice', 'error.forms.cant-save-user');
                    }
                }
            }
            $this->render('register', array(
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

        public function actionHelp() 
        { 
            $this->render('help');
        }
    }
