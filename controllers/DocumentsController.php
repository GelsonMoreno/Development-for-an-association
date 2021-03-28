<?php


namespace app\controllers;


use yii\web\Controller;

class DocumentsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    return $this->render('index');

  }
}