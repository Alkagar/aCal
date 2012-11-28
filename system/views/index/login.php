<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php $activeForm = $this->beginWidget('CActiveForm', array(
            'id' => $formName,
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); 
    ?>

    <div class="row">
        <div class='form-cell form-label'>
            <?php echo $activeForm->labelEx($form,'login'); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->textField($form,'login'); ?>
        </div>
        <div class='form-cell'>
            <?php echo $activeForm->error($form,'login', array('class' => 'form-error')); ?>
        </div>
    </div>

    <div class="row">
        <div class='form-cell'>
        <?php echo $activeForm->labelEx($form,'password'); ?>
        </div>
        <div class='form-cell'>
        <?php echo $activeForm->passwordField($form,'password'); ?>
        </div>
        <div class='form-cell'>
        <?php echo $activeForm->error($form,'password',  array('class' => 'form-error')); ?>
        </div>
    </div>

    <div>
        <?php echo $activeForm->checkBox($form,'rememberMe'); ?>
        <?php echo $activeForm->label($form,'rememberMe'); ?>
    </div>

    <div class="form-buttons">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
