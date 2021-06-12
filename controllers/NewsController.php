<?php


namespace app\controllers;
use app\models\LoginForm;
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

  public function actionNew(){
    $news= new News();

    if($news->load(Yii::$app->request->post()) && $news->validate()){
      $news->setUserID();
      $news->create_at=date('Y-m-d H:i:s');
      $news->save();
      return $this->redirect(['news/index']);
    }
    return $this->render('new', ['model'=>$news]);
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
      $news->update_at=date('Y-m-d H:i:s');
      $news->update();
      return $this->redirect(['news/index']);
    }

    return $this->render('edit', ['model'=>$news]);
  }

  public function actionOpen(){

    $this->view->params['login_form'] = new LoginForm();
    $params = Yii::$app->request->queryParams;
    $news_id = (int)$params['news_id'];
    $news = News::findOne(['id'=> $news_id]);

    return $this->render('open', ['model'=>$news]);
  }


  private function get_records() {
    $news = News::find();
    $params = Yii::$app->request->queryParams;

    if(isSet($params['search_field'])){
      $news = $news->where(['like', 'title', '%'. $params['search_field'].'%', false]);
    }
    return $news->orderBy('create_at desc')->all();
  }
}