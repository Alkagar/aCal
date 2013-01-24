<?php 
   $begin = date("H:i", strtotime($task->begin));
   $end = date("H:i", strtotime($task->end));
   $title = $task->name;
   $description = $task->description;
?>
<div>
   <div class='task-title'> <?php echo $title; ?></div>
   <div class='task-time'><?php echo $begin; ?> - <?php echo $end; ?></div>
   <div class='task-description'><?php echo $description; ?> </div>
</div>
