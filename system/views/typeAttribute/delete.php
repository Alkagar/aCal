<h1>delete type attribute</h1>

<?php if(Yii::app()->user->hasFlash('notice')) : ?>
<div class='notice'>
    <?php echo Yii::t('app', Yii::app()->user->getFlash('notice')); ?>
</div>
<?php endif; ?>
