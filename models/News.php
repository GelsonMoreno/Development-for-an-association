<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
  public function rules()
  {
    return [
      [['title', 'text', 'date'], 'required'],
    ];
  }

  public function attributeLabels(){

    return [
      'title' => 'Título',
      'date' =>'Data',
      'text'=>'Texto',

    ];
  }

  public function setUserID(){
    $this->Users_id = Yii::$app->user->identity->id;
  }
}