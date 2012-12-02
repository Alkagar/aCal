<?php

    class TaskType extends CActiveRecord
    {

        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }

        public function tableName()
        {
            return 'task_type';
        }

        public function rules()
        {
            return array(
                array('name', 'required'),
                array('required', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>60),
                array('description', 'safe'),
                array('id, name, description, required', 'safe', 'on'=>'search'),
            );
        }

        public function relations()
        {
            return array(
                'typeAttributes' => array(self::HAS_MANY, 'TypeAttribute', 'task_type_id'), 
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

        public function search()
        {
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);
            $criteria->compare('name',$this->name,true);
            $criteria->compare('description',$this->description,true);
            $criteria->compare('required',$this->required);

            return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
            ));
        }

        public static function getTypeToFormSelect()
        {
            $taskTypes = TaskType::model()->findAll();
            $typesOptions = array();
            foreach($taskTypes as $type) {
                $typesOptions[$type->id] = $type->name;
            }
            return $typesOptions;
        }
    }
