<?php


namespace app\models;


use yii\db\ActiveRecord;

class User_types extends ActiveRecord
{
   public static function admin_group(){
     return self::findOne(['designation'=> 'Administrador']);
   }
   public static function employee_group(){
        return self::findOne(['designation'=> 'Funcionário']);
   }
   public static function board_group(){
        return self::findOne(['designation'=> 'Direção']);
   }
   public static function associated_group(){
        return self::findOne(['designation'=> 'Associado']);
   }

   public static function document_select_public(){
     $array = [];

     foreach (self::find()->where(['<>', 'designation', 'Administrador'])->all() as $user_type){
       $array[$user_type->id] = $user_type->designation;
     }
     return $array;
   }
}