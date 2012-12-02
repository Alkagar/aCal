<?php

    class FormTypeAttribute extends CFormModel
    {
        public $id;
        public $name; 
        public $description; 
        public $default; 
        public $required; 
        public $task_type_id; 

        public function rules()
        {
            return array(
                array('name', 'required'),
                array('required, task_type_id', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>60),
                array('description, default', 'safe'),
                array('id, name, description, default, required, task_type_id', 'safe', 'on'=>'search'),
            );
        }

        public function attributeLabels()
        {
            return array(
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'default' => 'Default',
                'required' => 'Required',
                'task_type_id' => 'Task Type',
            );
        }
    }
