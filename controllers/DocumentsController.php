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
    $documents = Documents::find()->orderBy('date desc')->all();
    return $this->render('index',['documents' => $documents]);

  }
}