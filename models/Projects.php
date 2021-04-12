<?php


namespace app\models;


use yii\db\ActiveRecord;

class Projects extends ActiveRecord
{
  public function rules()
  {
    return [
      [['title','state','value','description','address','begin_date','end_date'],'required'],
      ['email','email']
    ];
  }

}