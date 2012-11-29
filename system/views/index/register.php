<p>Please fill out the following form with your personal data:</p>

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
        $standardFields = array('login', 'first_name', 'surname', 'email');
        foreach($standardFields as $field) : 
    ?>
    <div class="row">
        <div class='form-cell'>
            <?php echo $activeForm->labelEx($form, $field); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->textField($form, $field); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->error($form, $field,  array('class' => 'form-error')); ?>
        </div>
    </div>

    <?php endforeach; ?>
    <div class="row">
        <div class='form-cell'>
            <?php echo $activeForm->labelEx($form, 'password'); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->passwordField($form, 'password'); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->error($form, 'password', array('class' => 'form-error')); ?>
        </div>
    </div>
    <div class="row">
        <div class='form-cell'>
            <?php echo $activeForm->labelEx($form, 'password2'); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->passwordField($form, 'password2'); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->error($form, 'password2', array('class' => 'form-error')); ?>
        </div>
    </div>

    <div class="form-buttons">
        <?php echo CHtml::submitButton(Yii::t('app', 'forms.register')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
