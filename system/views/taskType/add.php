<h1>add task type</h1>

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

    <div>
        <?php echo $activeForm->checkBox($form,'required'); ?>
        <?php echo $activeForm->label($form,'required'); ?>
    </div>

    <div class="form-buttons">
        <?php echo CHtml::submitButton(Yii::t('app', 'forms.add')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
