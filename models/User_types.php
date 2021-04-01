<?php


namespace app\models;


use yii\db\ActiveRecord;

class User_types extends ActiveRecord
{
   public static function admin_group(){
     return self::findOne(['designation'=> 'admin']);
   }
}