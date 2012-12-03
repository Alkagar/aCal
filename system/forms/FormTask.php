<?php

    class FormTask extends CFormModel
    {
        public $id;
        public $name; 
        public $description; 
        public $duration; 
        public $user_id;
        public $begin;
        public $end;
        public $task_type_id;

        private $_identity;

        public function rules()
        {
            return array(
                array('name, task_type_id', 'required'),
                array('user_id, task_type_id', 'numerical', 'integerOnly'=>true),
                array('name, duration, begin, end', 'length', 'max'=>60),
                array('description', 'safe'),
                array('id, name, description, duration, user_id, begin, end, task_type_id', 'safe', 'on'=>'search'),
            );
        }

        public function attributeLabels()
        {
            return array(
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'duration' => 'Duration',
                'user_id' => 'User',
                'begin' => 'Begin',
                'end' => 'End',
                'task_type_id' => 'Task Type',
            );
        }
    }
