<h1>task lists</h1>

<?php foreach($tasks as $task) : ?>
<div>
    <?php 
        //$linkEdit = CHtml::link('edit', array('/taskType/edit', 'id' => $taskType->id)); 
        //$linkDelete = CHtml::link('x', array('/taskType/delete', 'id' => $taskType->id), array( 'confirm' => 'Are you sure?')); 
        //$linkAdd = CHtml::link('add attribute', array('/typeAttribute/add', 'id' => $taskType->id), array()); 
    ?>
    <strong>
        <?php echo $task->name, ' - ', $task->description; ?>
    </strong>
    <br />
        <?php echo $task->begin, ' - ', $task->end; ?>
    <?php foreach($task->taskAttributes as $taskAttribute) : ?>
    <?php echo CHtml::tag('div', array(), $taskAttribute->attributeType->description . ' => ' . $taskAttribute->value); ?>
    <?php endforeach; ?>
</div>
<?php endforeach; ?>
