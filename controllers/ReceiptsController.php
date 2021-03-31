<?php


namespace app\controllers;


use app\models\Receipts;
use yii\web\Controller;

class ReceiptsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $receipts = $this->get_records();
    return $this->render('index', ['receipts' => $receipts]);

  }
  private function get_records() {
    //$documents = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return Receipts::find()->orderBy('date desc')->all();
  }
}