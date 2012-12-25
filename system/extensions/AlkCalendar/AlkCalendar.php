<?php
    class AlkCalendar extends CWidget
    {

        public function init()
        { 
            $this->render('calendar', array(
                'date' => date('Y:m:d'), 
                ));
        }

        public function run() 
        { }
    }
