<?php

   class TaskController extends AController
   {
      public function actionIndex()
      {
         $tasks = User::model()->findByPk(Yii::app()->user->id)->tasks;
         $this->render('index', array(
            'tasks' => $tasks,
         ));
      }

      /**
      * Displays the register page
      */
      public function actionAdd()
      { 
         $form = new FormTask();
         $form->setScenario('add');
         $formName = get_class($form);
         $typeAttributes = array();

         $this->_validateAjax($form, $formName);

         if(isset($_POST[$formName])) {
            $form->attributes = $_POST[$formName];
            $taskType = TaskType::model()->findByPk($form->task_type_id);
            $typeAttributes = $taskType->typeAttributes;
            if($form->validate()) {
               $task = new Task();
               $task->attributes = $_POST[$formName];
               $duration = strtotime($task->end) - strtotime($task->begin);
               $task->duration = $duration * 60; // always in minutes
               $task->user_id = Yii::app()->user->id; 
               if($task->save()) {
                  $specific = $_POST['specific'];
                  foreach($typeAttributes as $typeAttribute) {
                     $taskAttribute = new TaskAttribute();
                     $taskAttribute->task_id = $task->id;
                     $taskAttribute->task_type_id = $typeAttribute->id;
                     $taskAttribute->value = $_POST['specific'][$typeAttribute->name];
                     $taskAttribute->save();
                  }
                  $this->redirect(Yii::app()->createUrl('/task'));
               } else {
                  Yii::app()->user->setFlash('notice', 'error.forms.cant-save');
               }
            } else {

               var_dump($form->getErrors());
            }
         }
         $this->render('add', array(
            'form' => $form,
            'formName' => $formName,
            'taskTypes' => TaskType::getTypeToFormSelect(),
            'typeAttributes' => $typeAttributes,
         ));
      }

      public function actionDelete($id)
      {
         $task = Task::model()->findByPk($id);
         if($task->removeTask()) {
            $this->redirect(Yii::app()->createUrl('/taskType'));
         } else {
            Yii::app()->user->setFlash('notice', 'error.forms.cant-save');
         }
         $this->render('delete', array());
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
               $this->renderPartial('form-specific-types', array('typeAttributes' => $taskType->typeAttributes));
            }
         }
      }
   }
