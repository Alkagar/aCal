<?php

    class FormUser extends CFormModel
    {
        public $login;
        public $password;
        public $rememberMe;
        public $email;
        public $password2;
        public $first_name;
        public $surname;

        private $_identity;

        public function rules()
        {
            return array(
                // login and password are required
                array('login, password', 'required'),
                array('email', 'email'),
                array('rememberMe', 'boolean'),

                array('password', 'authenticate', 'on' => 'login'),

                array('password2, email, first_name, surname', 'required', 'on' => 'register'),
                array('login', 'unique', 'attributeName'=> 'login', 'on' => 'register', 'className' => 'User'),
                array('email', 'unique', 'attributeName'=> 'email', 'on' => 'register', 'className' => 'User'),
                array('password', 'compare', 'compareAttribute' => 'password2', 'on' => 'register'),

            );
        }

        public function attributeLabels()
        {
            return array(
                'rememberMe'=>'Remember me next time',
            );
        }

        /**
        * authentcate validator for password field
        */
        public function authenticate($attribute, $params)
        {
            if(!$this->hasErrors())
            {
                $this->_identity = new AUserIdentity($this->login, $this->password);
                if(!$this->_identity->authenticate()) {
                    $this->addError('password','Incorrect login or password.');
                }
            }
        }

        /**
        * Logs in the user using the given login and password in the model.
        * @return boolean whether login is successful
        */
        public function login()
        {
            if($this->_identity === null) {
                $this->_identity = new AUserIdentity($this->login,$this->password);
                $this->_identity->authenticate();
            }
            if($this->_identity->errorCode === AUserIdentity::ERROR_NONE) {
                $duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
                Yii::app()->user->login($this->_identity, $duration);
                return true;
            } else {
                return false;
            }
        }
    }
