<?php


namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Contact_us  extends ActiveRecord
{
    public function rules()
    {
      return [
        [['name','email','number','description'],'required'],
        ['email','email']
      ];
    }

    public function attributeLabels(){

      return [
        'name' => 'Nome',
        'email' =>'Email',
        'number' =>'Número',
        'description'=>'Descrição'
      ];
    }

    public function destroyWithMessage(){
      if($this->Message_id){
        $message = Message::findOne(['id' => $this->Message_id]);
        $message->Contact_us_id = null;
        $message->save();
        $this->Message_id = null;
        $this->save();
        $message->delete();
      }
      $this->delete();
    }
}