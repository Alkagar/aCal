<?php

    /**
    * m121127_214624_add_user_created_time 
    * add columns for storing modification time (like ror one)
    * 
    * @copyright 
    * @author Jakub Mrowiec Alkagar <alkagar@gmail.com> 
    */
    class m121127_214624_add_user_created_time extends CDbMigration
    {
        public function up()
        {
            $this->addColumn('user', 'created_at', 'text');
            $this->addColumn('user', 'modified_at', 'text');
            $this->update('user', array(
                'created_at' => date('Y-m-d H:i:s'),
                'modified_at' => date('Y-m-d H:i:s'),
            ));
        }

        public function down()
        {
            $this->dropColumn('user', 'created_at');
            $this->dropColumn('user', 'modified_at');
        }
    }
