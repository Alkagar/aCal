<?php
    class ADateTime
    {
        public static function render($view, $form, $element) 
        {
            $options = array(
                'dateFormat' => 'yy-mm-dd', 
                'timeFormat' => 'hh:mm', 
                'stepMinute' => 5,
            );
            $view->widget('ext.jui.EJuiDateTimePicker', array(
                'model' => $form, 
                'attribute' => $element, 
                'options' => $options,
            ));
        }
    }
