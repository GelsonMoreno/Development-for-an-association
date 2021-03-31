<?php


namespace app\controllers;


use app\models\Documents;
use yii\web\Controller;

class DocumentsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $documents = $this->get_records();
    return $this->render('index',['documents' => $documents]);

  }

  private function get_records() {
    //$documents = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return Documents::find()->orderBy('date desc')->all();
  }
}