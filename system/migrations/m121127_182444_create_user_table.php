<?php

    /**
    * m121127_182444_create_user_table 
    * create users table
    * 
    * @copyright 
    * @author Jakub Mrowiec Alkagar <alkagar@gmail.com> 
    */
    class m121127_182444_create_user_table extends CDbMigration
    {
        public function up()
        {
            $this->createTable('user', array(
                "id" => "pk",
                "login" => "VARCHAR(60) NOT NULL",
                "password" => "VARCHAR(60) NOT NULL",
                "first_name" => "VARCHAR(60) DEFAULT ''",
                "surname" => "VARCHAR(60) DEFAULT ''",
                "email" => "VARCHAR(60) DEFAULT ''",
            ));
            $this->createIndex('email', 'user', 'email', true);
            $this->createIndex('login', 'user', 'login', true);

            $this->insert('user', array(
                'login' => 'alkagar',
                'password' => sha1('pharazon'),
                'first_name' => 'Jakub',
                'surname' => 'Mrowiec',
                'email' => 'jakub@mrowiec.org',
            ));
        }

        public function down()
        {
            $this->dropTable('user');
        }
    }
