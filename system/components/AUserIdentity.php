<?php

    class AUserIdentity extends CUserIdentity
    {
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
            }
            return !$this->errorCode;
        }
    }
