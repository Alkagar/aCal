<?php
$hours = array_fill(0, 24, array());
foreach($tasks as $task) {
    $hourBegin = date("G", strtotime($task->begin));
    $hourEnd = date("G", strtotime($task->end));
    $duration = array_fill($hourBegin, $hourEnd - $hourBegin + 1, array());
    foreach($duration as  $h => $emptyValue) {
        $hours[$h][] = $task;
    }
}
$today = strtotime(date("Y-m-d"));
echo CHtml::tag('h3', array('class' => 'title-day'), '<< ');
echo CHtml::tag('h3', array('class' => 'title-day'), date("Y-m-d", $today));
echo CHtml::tag('h3', array('class' => 'title-day'), ' >>');
foreach($hours as $h => $tasks) {
    $hour = $today + $h * 60 * 60;
    $hourDiv = CHtml::tag('div', array('class' => 'day-view-hour'), date("H:i", $hour));
    $tasksHtml = '';
    foreach($tasks as $task) {
        $tasksHtml .= CHtml::tag('div', array('class' => 'task-box'), $task->name);
    }
    $taskDiv = CHtml::tag('div', array('class' => 'day-view-tasks'), $tasksHtml);
    echo CHtml::tag('div', array('class' => 'day-view-row'), $hourDiv . $taskDiv );
}
?>

