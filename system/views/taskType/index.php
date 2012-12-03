<h1>types lists</h1>

<?php foreach($types as $taskType) : ?>
<div>
    <?php 
        $linkEdit = CHtml::link('edit', array('/taskType/edit', 'id' => $taskType->id)); 
        $linkDelete = CHtml::link('x', array('/taskType/delete', 'id' => $taskType->id), array( 'confirm' => 'Are you sure?')); 
        $linkAdd = CHtml::link('add attribute', array('/typeAttribute/add', 'id' => $taskType->id), array()); 
    ?>
    <strong>
        <?php echo $taskType->name, ' - ', $taskType->description, ' - ', ($taskType->required == 1 ? 'wymagany - ' : '' ), $linkEdit, ' - ', $linkDelete, ' - ', $linkAdd; ?>
    </strong>
    <?php foreach($taskType->typeAttributes as $typeAttr) : ?>
    <?php
        $linkDelete = CHtml::link('x', array('/typeAttribute/delete', 'id' => $typeAttr->id), array( 'confirm' => 'Are you sure?')); 
        $linkEdit = CHtml::link('edit', array('/typeAttribute/edit', 'id' => $typeAttr->id), array()); 
        echo CHtml::tag('div', array('style' => 'padding-left:10px;'), $typeAttr->name . ' (' . $typeAttr->description . ') ' . $linkDelete . ' - ' . $linkEdit);
    ?>
    <?php endforeach; ?>
</div>
<?php endforeach; ?>
