<?php


namespace app\models;


use yii\db\ActiveRecord;
use Yii;
class Message extends ActiveRecord
{
    public function rules()
    {
      return [
        [['title','text'],'string'],
        [['title','text', 'Contact_us_id', 'Users_id'],'required'],
        [['Contact_us_id', 'Users_id'],'integer'],
      ];
    }

    public function attributeLabels(){

      return [
        'title' => 'Assunto',
        'text' =>'Texto',
      ];
    }
  public function setUserID(){
    $this->Users_id = Yii::$app->user->identity->id;
  }

  public function getUserName(){
    return User::findOne(['id' => $this->Users_id]);
  }

  public function getContactEmail(){
    return User::findOne(['id' => $this->Contact_us_id]);
  }

  public function getContactUs(){
      return Contact_us::findOne(['id' => $this->Contact_us_id]);
  }
}