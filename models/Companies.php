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

  public function updateBalance($new_Balance){
      $this->balance = $this->balance + $new_Balance;
      $this->update();
  }

    public function attributeLabels(){

        return [
            'name' => 'Nome',
            'balence'=> 'Saldo',


        ];
    }
    public function getProject(){
        return Companies::findOne(['id' => $this->Companies_id]);
    }

}