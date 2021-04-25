<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Receipts extends ActiveRecord
{
  public function rules()
  {
    return [
      [['title', 'description', 'type', 'value', 'address'], 'string'],
      [['Projects_id', 'Companies_id'],'integer'],
      [['title', 'description', 'value', 'address','Projects_id', 'Companies_id'], 'required'],
      [['file'], 'file']
    ];
  }

  public function attributeLabels(){

    return [
      'title' => 'Título',
      'type' =>'Tipo',
      'create_at' =>'Data de criação',
      'update_at' =>'Data de modificação',
      'description'=>'Descrição',
      'file' => 'Ficheiro',
      'address' => 'Local',
      'Projects_id' => 'Projetos',
      'Companies_id' => 'Empresas'
    ];
  }
  public function setUserID(){
    $this->Users_id = Yii::$app->user->identity->id;
  }

  public function receiptUrlForDownload(){
    return '/index.php?r=receipts/download&receipts_name=receipt_' . $this->id . '_' .$this->file;
  }

  public function setPreviousFile(){
    $this->file = Receipts::findOne(['id' => $this->id])->file;
  }

  public function getProject(){
    return Projects::findOne(['id' => $this->Projects_id]);
  }

  public function getCompanies(){
    return Companies::findOne(['id' => $this->Companies_id]);
  }

}