<?php


namespace app\controllers;

use Yii;
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

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $news_id = (int)$params['news_id'];
    $news = News::findOne(['id'=> $news_id]);

    return $this->render('show', ['model'=>$news]);

  }
  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $news_id = (int)$params['news_id'];
    $news = News::findOne(['id'=> $news_id]);
    $news->delete();

    return $this->redirect(['news/index']);
  }

  public function actionUpdate(){
    $params = Yii::$app->request->queryParams;
    $news_id = (int)$params['news_id'];
    $news = News::findOne(['id' => $news_id]);

    if($news->load(Yii::$app->request->post()) && $news->validate()){
      $news->update();
      return $this->redirect(['news/index']);
    }

    return $this->render('edit', ['model'=>$news]);
  }

  public function actionNew(){
    $news= new News();

    if($news->load(Yii::$app->request->post()) && $news->validate()){
      $news->setUserID();
      $news->save();
      return $this->redirect(['news/index']);
    }

    return $this->render('new', ['model'=>$news]);
  }
}