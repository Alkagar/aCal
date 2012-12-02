<?php

    class FormTaskType extends CFormModel
    {
        public $id;
        public $name; 
        public $description; 
        public $required; 

        public function rules()
        {
            return array(
                array('name', 'required'),
                array('required', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max' => 60),
                array('description', 'safe'),
                array('id, name, description, required', 'safe', 'on'=>'search'),
            );
        }

        public function attributeLabels()
        {
                return array(
                    'id' => 'ID',
                    'name' => 'Name',
                    'description' => 'Description',
                    'required' => 'Required',
                );
        }
    }
