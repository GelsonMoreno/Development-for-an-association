<?php


namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class Payments extends ActiveRecord
{
    public function rules()
    {
        return [
            [['description', 'type', 'value','address','payment_type'], 'string'],
            [['Projects_id'],'integer'],
            [['description','address','value','payment_type','Projects_id'], 'required'],
            [['file'], 'file']
        ];
    }

    public function attributeLabels(){

        return [
            'type' => 'Tipo',
            'description'=> 'Descrição',
            'file' => 'Ficheiro',
            'public' => 'Permissão',
            'value'=> 'Valor',
            'address'=> 'Endreço',
            'payment_type'=> 'Modo de pagemnto',
            'Projects_id' => 'Projectos',
            'create_at' => 'Data de Criação'

        ];
    }

    public function setUserID(){
        $this->Users_id = Yii::$app->user->identity->id;
    }

    public function paymentUrlForDownload(){
        return '/index.php?r=payments/download&payment_name=payment_' . $this->id . '_' .$this->file;
    }

    public function setPreviousFile(){
        $this->file = Payments::findOne(['id' => $this->id])->file;
    }

    public function getProject(){
        return Projects::findOne(['id' => $this->Projects_id]);
    }
}