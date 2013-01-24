<?php
   $hours = array_fill(0, 24, array());
   $preparedTasks = array();
   $today = strtotime(date("Y-m-d"));
   foreach($tasks as $task) {
      $begin = strtotime($task->begin);
      $end = strtotime($task->end);
      $startAfterMidnightInMinutes = ($begin - strtotime(date("Y-m-d", strtotime($task->begin)))) / 60;
      // TODO: add handling for two day tasks
      $stopAfterMidnightInMinutes = ($end - strtotime(date("Y-m-d", strtotime($task->begin)))) / 60;
      $durationInMinutes = ($end - $begin) / 60;
      $taskData = new stdClass();
      $taskData->task = $task;
      $taskData->startAfterMidnightInMinutes = $startAfterMidnightInMinutes;
      $taskData->stopAfterMidnightInMinutes = $stopAfterMidnightInMinutes;
      $taskData->durationInMinutes = $durationInMinutes;
      $preparedTasks[] = $taskData;
   }
   $hoursHtml = '';
   foreach($hours as $hour => $h) {
      $hoursHtml .= CHtml::tag('div', array('class' => 'hour-row'), date('H:i', $today + 60*60 * $hour));
   }
   echo CHtml::tag('h3', array('class' => 'title-day'), '<< ');
   echo CHtml::tag('h3', array('class' => 'title-day'), date("Y-m-d", $today));
   echo CHtml::tag('h3', array('class' => 'title-day'), ' >>');
   $allTasks = '';
   $i = 0;
   foreach($preparedTasks as $taskData) {
      $taskParameters = array(
         'data-duration' => $taskData->durationInMinutes,
         'data-start' => $taskData->startAfterMidnightInMinutes,
         'data-end' => $taskData->stopAfterMidnightInMinutes,
         'class' => 'task-box',
         'style' => ''
      );
      $singleTaskView = $this->render('single-task-view', array('task' => $taskData->task), true);
      $allTasks .= CHtml::tag('div', $taskParameters, $singleTaskView);
   }
   $container = CHtml::tag('div', array('class' => 'tasks-container'), $hoursHtml . $allTasks);
   echo $container;
