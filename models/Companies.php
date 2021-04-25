<?php


namespace app\models;


use yii\db\ActiveRecord;

class Companies extends ActiveRecord
{
  public function rules()
  {
    return [
      [['name','balance'],'required'],];
  }

}