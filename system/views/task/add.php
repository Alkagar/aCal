<h1>add task</h1>

<?php if(Yii::app()->user->hasFlash('notice')) : ?>
<div class='notice'>
    <?php echo Yii::t('app', Yii::app()->user->getFlash('notice')); ?>
</div>
<?php endif; ?>

<div class="form">
    <?php 
        $activeForm = $this->beginWidget('CActiveForm', array(
            'id' => $formName,
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); 
    ?>

    <div class="row">
        <div class='form-cell form-label'> <?php echo $activeForm->labelEx($form, 'name'); ?> </div>
        <div class='form-cell'> <?php echo $activeForm->textField($form, 'name'); ?> </div>
        <div class='form-cell'> <?php echo $activeForm->error($form, 'name',  array('class' => 'form-error')); ?> </div>
    </div>

    <div class="row">
        <div class='form-cell form-label'> <?php echo $activeForm->labelEx($form, 'description'); ?> </div>
        <div class='form-cell'> <?php echo $activeForm->textField($form, 'description'); ?> </div>
        <div class='form-cell'> <?php echo $activeForm->error($form, 'description',  array('class' => 'form-error')); ?> </div>
    </div>

    <div class="row">
        <div class='form-cell form-label'> <?php echo $activeForm->labelEx($form, 'begin'); ?> </div>
        <div class='form-cell'> <?php ADateTime::render($this, $form, 'begin'); ?> </div>
        <div class='form-cell'> <?php echo $activeForm->error($form, 'begin',  array('class' => 'form-error')); ?> </div>
    </div>

    <div class="row">
        <div class='form-cell form-label'> <?php echo $activeForm->labelEx($form, 'end'); ?> </div>
        <div class='form-cell'> <?php ADateTime::render($this, $form, 'end'); ?> </div>
        <div class='form-cell'> <?php echo $activeForm->error($form, 'end',  array('class' => 'form-error')); ?> </div>
    </div>

    <div class="row">
        <div class='form-cell form-label'> <?php echo $activeForm->labelEx($form, 'task_type_id'); ?> </div>
        <div class='form-cell'> 
            <?php echo $activeForm->dropDownList($form, 'task_type_id', $taskTypes, array(
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => $this->createUrl('/task/getFormSpecificTypes'),
                        'update'=>'#dynamic-form',
                    ),
                    'empty' => 'wybierz typ zadania',
                )
            ); ?> 
        </div>
        <div class='form-cell'> <?php echo $activeForm->error($form, 'task_type_id',  array('class' => 'form-error')); ?> </div>
    </div>

    <div id='dynamic-form'>
        <?php $this->renderPartial('form-specific-types', array('typeAttributes' => $typeAttributes)); ?>
    </div>

    <div class="form-buttons">
        <?php echo CHtml::submitButton(Yii::t('app', 'forms.add')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
