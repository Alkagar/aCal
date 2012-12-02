<?php foreach($taskType->typeAttributes as $typeAttribute) : ?>
<div class="row">
    <div class='form-cell form-label'> <?php echo CHtml::label($typeAttribute->name, $typeAttribute->name); ?> </div>
    <div class='form-cell'> <?php echo CHtml::textField($typeAttribute->name); ?> </div>
</div>
<?php endforeach; ?>
