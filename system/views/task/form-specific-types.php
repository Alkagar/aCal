<?php foreach($typeAttributes as $typeAttribute) : ?>
<?php 
    $name = 'specific[' . $typeAttribute->name . ']';
    $value = isset($_POST['specific'][$typeAttribute->name]) ? $_POST['specific'][$typeAttribute->name] : '';
?>
<div class="row">
    <div class='form-cell form-label'> <?php echo CHtml::label($typeAttribute->name, $typeAttribute->name); ?> </div>
    <div class='form-cell'> <?php echo CHtml::textField($name, $value); ?> </div>
</div>
<?php endforeach; ?>
