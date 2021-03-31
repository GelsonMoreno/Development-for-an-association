<?php


namespace app\controllers;


use app\models\News;
use yii\web\Controller;

class NewsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $news = $this->get_records();
    return $this->render('index',['news' => $news]);

  }

  private function get_records() {
    //$payments = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return News::find()->orderBy('date desc')->all();
  }
}