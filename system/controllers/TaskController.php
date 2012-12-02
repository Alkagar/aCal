<?php

    class TaskController extends AController
    {
        /**
        * Displays the main/index page
        */
        public function actionIndex()
        {
            $this->render('index');
        }

        /**
        * Displays the register page
        */
        public function actionAdd()
        { 
            $form = new FormTask();
            $form->setScenario('add');
            $formName = get_class($form);

            $this->_validateAjax($form, $formName);

            if(isset($_POST[$formName])) {
                $form->attributes = $_POST[$formName];
                if($form->validate()) {
                    $task = new Task();
                    $task->attributes = $_POST[$formName];
                    if($task->save()) {
                        $this->redirect('/task');
                    } else {
                        Yii::app()->user->setFlash('notice', 'error.forms.cant-save');
                    }
                }
            }
            $this->render('add', array(
                'form' => $form,
                'formName' => $formName,
                'taskTypes' => TaskType::getTypeToFormSelect(),
            ));
        }

        public function actionGetFormSpecificTypes()
        {
            $form = new FormTask();
            $form->setScenario('getTypes');
            $formName = get_class($form);

            if(isset($_POST[$formName])) {
                $taskTypeId = $_POST[$formName]['task_type_id'];
                $taskType = TaskType::model()->findByPk($taskTypeId);
                if(!is_null($taskType)) {
                    $this->renderPartial('form-specific-types', array('taskType' => $taskType));
                }
            }
        }
    }
