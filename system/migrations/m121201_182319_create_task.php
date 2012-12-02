<?php

class m121201_182319_create_task extends CDbMigration
{
	public function up()
	{

            $this->createTable('task_type', array(
                "id" => "pk",
                "name" => "VARCHAR(60) NOT NULL",
                "description" => "TEXT",
                "required" => "INT", // 0 => not required, 1 => required
            ));

            $this->createTable('task', array(
                "id" => "pk",
                "name" => "VARCHAR(60) NOT NULL",
                "description" => "text",
                "duration" => "VARCHAR(60) DEFAULT ''",
                "user_id" => "INT NOT NULL",
                "begin" => "VARCHAR(60) DEFAULT ''",
                "end" => "VARCHAR(60) DEFAULT ''",
                "task_type_id" => "INT NOT NULL",
            ));

            $this->createTable('type_attribute', array(
                "id" => "pk",
                "name" => "VARCHAR(60) NOT NULL",
                "description" => "TEXT",
                "default" => "TEXT",
                "required" => "INT", // 0 => not required, 1 => required
                "task_type_id" => "INT", // 0 => not required, 1 => required
            ));

            $this->createTable('task_attribute', array(
                "id" => "pk",
                "task_id" => "INT",
                "task_type_id" => "INT",
                "value" => "TEXT",
            ));
	}

	public function down()
	{
            $this->dropTable('task_type');
            $this->dropTable('task');
            $this->dropTable('type_attribute');
            $this->dropTable('task_attribute');
	}
}
