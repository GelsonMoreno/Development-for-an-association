<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
  public function rules()
  {
    return [
      [['title', 'text'], 'required'],
    ];
  }

  public function attributeLabels(){

    return [
      'title' => 'Título',
      'text'=>'Texto',

    ];
  }

  public function setUserID(){
    $this->Users_id = Yii::$app->user->identity->id;
  }
}