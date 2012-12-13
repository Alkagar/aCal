<?php
    $tt = '';
?>

<h1>types lists</h1>


<?php foreach($types as $taskType) : ?>
<div>
    <?php 
        $linkEdit = CHtml::link('', array('/taskType/edit', 'id' => $taskType->id), array('class' => 'icon ico-settings')); 
        $linkDelete = CHtml::link('', array('/taskType/delete', 'id' => $taskType->id), array( 'class' => 'icon ico-delete', 'confirm' => 'Are you sure?')); 
        $linkAdd = CHtml::link('', array('/typeAttribute/add', 'id' => $taskType->id), array('class' => 'icon ico-round-plus', 'alt' => 'Add attribute')); 

        $taskName = CHtml::tag('td', array(), $taskType->name);
        $taskMenu = CHtml::tag('td', array(), $linkEdit . $linkDelete . $linkAdd);
        $taskDesc = CHtml::tag('p', array(), $taskType->description);

        $tr = CHtml::tag('tr', array(), $taskName . $taskMenu);
        $tt .= $tr;
        $tr = CHtml::tag('tr', array('colspan' => 2), $taskDesc);
        $tt .= $tr;
    ?>
    <?php foreach($taskType->typeAttributes as $typeAttr) : ?>
    <?php
        $linkDelete = CHtml::link('', array('/typeAttribute/delete', 'id' => $typeAttr->id), array( 'confirm' => 'Are you sure?', 'class' => 'icon ico-delete')); 
        $linkEdit = CHtml::link('', array('/typeAttribute/edit', 'id' => $typeAttr->id), array('class' => 'icon ico-settings')); 
        echo CHtml::tag('div', array('style' => 'padding-left:10px;'), $typeAttr->name . ' (' . $typeAttr->description . ') ' . $linkDelete . ' ' . $linkEdit);
    ?>
    <?php endforeach; ?>
</div>
<?php endforeach; ?>
<?php 
    echo $tt;
?>
