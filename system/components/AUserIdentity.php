<?php

    class AUserIdentity extends CUserIdentity
    {
        private $_id;

        /**
        * Authenticates a user.
        * @return boolean whether authentication succeeds.
        */
        public function authenticate()
        {
            $users = array(
                'demo' => 'demo',
                'admin' => 'admin',
            );
            $user = User::getByLogin($this->username);

            if(is_null($user)) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } else if($user->password !== sha1($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->errorCode = self::ERROR_NONE;
                $this->_id = $user->id;
                $this->setState('data', $user);

            }
            return !$this->errorCode;
        }

        public function getId()
        {
            return $this->_id;
        }
    }
