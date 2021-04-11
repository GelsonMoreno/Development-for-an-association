<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Documents extends ActiveRecord
{
  public function rules()
  {
    return [
      [['title', 'description', 'type', 'date'], 'string'],
      [['file'], 'file']
    ];
  }

  public function attributeLabels(){

    return [
      'title' => 'Título',
      'type' =>'Tipo',
      'date' =>'Data',
      'description'=>'Descrição',
      'file' => 'Ficheiro'
    ];
  }

  public function setUserID(){
    $this->Users_id = Yii::$app->user->identity->id;
  }

  public function documentUrlForDownload(){
    return '/index.php?r=documents/download&document_name=document_' . $this->id . '_' .$this->file;
  }

  public function setPreviousFile(){
    $this->file = Documents::findOne(['id' => $this->id])->file;
  }

}