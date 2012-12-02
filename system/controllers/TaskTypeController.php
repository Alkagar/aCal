<?php

    class TaskTypeController extends AController
    {
        public function actionIndex()
        {
            $types = TaskType::model()->findAll();
            $this->render('index', array(
                'types' => $types,
            ));
        }

        public function actionEdit($id)
        {
            $form = new FormTaskType();
            $form->setScenario('add');
            $formName = get_class($form);
            $type = TaskType::model()->findByPk($id);

            $this->_validateAjax($form, $formName);

            if(isset($_POST[$formName])) {
                $form->attributes = $_POST[$formName];
                if($form->validate()) {
                    $type->attributes = $_POST[$formName];
                    if($type->save()) {
                        $this->redirect('/taskType');
                    } else {
                        Yii::app()->user->setFlash('notice', 'error.forms.cant-save');
                    }
                }
            } else {
                $form->attributes = $type->attributes;
            }
            $this->render('add', array(
                'form' => $form,
                'formName' => $formName,
            ));
        }

        public function actionAdd()
        { 
            $form = new FormTaskType();
            $form->setScenario('add');
            $formName = get_class($form);

            $this->_validateAjax($form, $formName);

            if(isset($_POST[$formName])) {
                $form->attributes = $_POST[$formName];
                if($form->validate()) {
                    $type = new TaskType();
                    $type->attributes = $_POST[$formName];
                    if($type->save()) {
                        $this->redirect('/taskType');
                    } else {
                        Yii::app()->user->setFlash('notice', 'error.forms.cant-save');
                    }
                }
            }
            $this->render('add', array(
                'form' => $form,
                'formName' => $formName,
            ));
        }

        public function actionDelete($id)
        {
            $type = TaskType::model()->findByPk($id);
            foreach($type->typeAttributes as $ta) {
                $ta->delete();
            }
            if($type->delete()) {
                $this->redirect('/taskType');
            } else {
                Yii::app()->user->setFlash('notice', 'error.forms.cant-save');
            }
            $this->render('delete', array());
        }
    }
