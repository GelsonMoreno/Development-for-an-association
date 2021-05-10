<?php


namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class Projects extends ActiveRecord
{
  public function rules()
  {
    return [
      [['title','state','value','description','address','begin_date','end_date'],'required'],
    ];
  }

    public function attributeLabels(){

        return [
            'title' => 'Titulo',
            'description'=> 'Descrição',
            'state' => 'Estado',
            'begin_date' => 'Data Inicial',
            'value'=> 'Valor',
            'address'=> 'Endreço',
            'end_date'=> 'Data Final',
        ];
    }

    public function getProject(){
        return Projects::findOne(['id' => $this->Projects_id]);
    }

}




