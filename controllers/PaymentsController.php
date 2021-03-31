<?php


namespace app\controllers;


use app\models\Payments;
use yii\web\Controller;

class PaymentsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $payments = $this->get_records();
    return $this->render('index',['payments' => $payments]);

  }

  private function get_records() {
    //$payments = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return Payments::find()->orderBy('date desc')->all();
  }
}
