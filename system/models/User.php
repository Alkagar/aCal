<?php

    class User extends CActiveRecord
    {
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }

        public function tableName()
        {
            return 'user';
        }

        public function rules()
        {
            return array(
                array('login, password', 'required'),
                array('login, password, first_name, surname, email', 'length', 'max' => 60),
                array('id, login, password, first_name, surname, email', 'safe', 'on' => 'search'),

                array('created_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'update'),
                array('created_at,modified_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'insert')
            );
        }

        public function relations()
        {
            return array(
                'tasks' => array(self::HAS_MANY, 'Task', 'user_id'), 
            );
        }

        /**
        * @return array customized attribute labels (name=>label)
        */
        public function attributeLabels()
        {
            return array(
                'id' => 'ID',
                'login' => 'Login',
                'password' => 'Password',
                'first_name' => 'First Name',
                'surname' => 'Surname',
                'email' => 'Email',
            );
        }

        public function search()
        {
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);
            $criteria->compare('login',$this->login,true);
            $criteria->compare('password',$this->password,true);
            $criteria->compare('first_name',$this->first_name,true);
            $criteria->compare('surname',$this->surname,true);
            $criteria->compare('email',$this->email,true);

            return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
            ));
        }

        public static function getByLogin($login) 
        {
            $criteria = new CDbCriteria();
            $criteria->addColumnCondition(array(
                'login' => $login, 
            ));
            $user = self::model()->find($criteria); 
            return $user;
        }
    }
