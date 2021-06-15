<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Documents extends ActiveRecord
{
  public function rules()
  {
    return [
      [['title', 'description', 'type'], 'string'],
      [['title', 'description'], 'required'],
      [['file'], 'file']
    ];
  }

  public function attributeLabels(){

    return [
      'title' => 'Título',
      'type' =>'Tipo',
      'create_at' =>'Data de criação',
      'update_at' =>'Data de criação',
      'description'=>'Descrição',
      'file' => 'Ficheiro',
      'public' =>'Permissão',
      'create_at' => 'Data de Criação'

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