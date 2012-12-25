<?php
    $hours = array_fill(0, 24, array());
        foreach($hours as $h => $tasks) {
            $hourDiv = CHtml::tag('div', array('style' => 'display:inline; margin-right:20px;'), sprintf('%02d', $h));
        $taskDiv = CHtml::tag('div', array('style' => 'display:inline;'), ' ');
        echo CHtml::tag('div', array(), $hourDiv . $taskDiv);
    }
?>

