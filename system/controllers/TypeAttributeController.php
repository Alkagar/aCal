<?php

    class TypeAttributeController extends AController
    {
        public function actionAdd($id)
        { 
            $form = new FormTypeAttribute();
            $form->setScenario('add');
            $formName = get_class($form);

            $this->_validateAjax($form, $formName);

            if(isset($_POST[$formName])) {
                $form->attributes = $_POST[$formName];
                if($form->validate()) {
                    $typeAttribute = new TypeAttribute();
                    $typeAttribute->attributes = $_POST[$formName];
                    $typeAttribute->task_type_id = $id;
                    if($typeAttribute->save()) {
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
            $typeAttribute = TypeAttribute::model()->findByPk($id);
            if($typeAttribute->delete()) {
                $this->redirect('/taskType');
            } else {
                Yii::app()->user->setFlash('notice', 'error.forms.cant-save');
            }
            $this->render('delete', array());
        }
    }
