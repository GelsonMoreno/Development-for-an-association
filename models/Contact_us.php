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
        'email' =>'E-mail',
        'number' =>'Número',
        'description'=>'Descrição'
      ];
    }
}