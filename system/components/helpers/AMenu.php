<?php
   class AMenu
   {
      public static function render()
      {
         if(Yii::app()->user->isGuest) {
            $menu = Yii::app()->params['menu']['guest'];
         } else {
            $menu = Yii::app()->params['menu']['user'];
         }
         foreach($menu as $title => $route) {
            echo CHtml::link(Yii::t('app', $title), Yii::app()->createUrl($route));
            echo ' | ';
         }
      }
   }
