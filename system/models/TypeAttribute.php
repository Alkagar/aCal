<?php

    class TypeAttribute extends CActiveRecord
    {
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }

        public function tableName()
        {
            return 'type_attribute';
        }

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

        public function relations()
        {
            return array();
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

        public function search()
        {
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);
            $criteria->compare('name',$this->name,true);
            $criteria->compare('description',$this->description,true);
            $criteria->compare('default',$this->default,true);
            $criteria->compare('required',$this->required);
            $criteria->compare('task_type_id',$this->task_type_id);

            return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
            ));
        }
    }
