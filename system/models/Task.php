<?php

    class Task extends CActiveRecord
    {
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }

        public function tableName()
        {
            return 'task';
        }

        public function rules()
        {
            return array(
                array('name, user_id, task_type_id', 'required'),
                array('user_id, task_type_id', 'numerical', 'integerOnly'=>true),
                array('name, duration, begin, end', 'length', 'max'=>60),
                array('description', 'safe'),
                array('id, name, description, duration, user_id, begin, end, task_type_id', 'safe', 'on'=>'search'),
            );
        }

        public function relations()
        {
            return array(
                'taskAttributes' => array(self::HAS_MANY, 'TaskAttribute', 'task_id'),
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

        public function search()
        {
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);
            $criteria->compare('name',$this->name,true);
            $criteria->compare('description',$this->description,true);
            $criteria->compare('duration',$this->duration,true);
            $criteria->compare('user_id',$this->user_id);
            $criteria->compare('begin',$this->begin,true);
            $criteria->compare('end',$this->end,true);
            $criteria->compare('task_type_id',$this->task_type_id);

            return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
            ));
        }
    }
