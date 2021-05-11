<?php

namespace app\controllers;

use app\models\Projects;
use yii\web\Controller;
use YII;


class ProjectsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest) {
        return $this->goHome();
    }
    $projects = $this->get_records();
    return $this->render('index', ['projects' => $projects]);

  }

  public function actionNew(){
    $projects = new Projects();
    if($projects->load(Yii::$app->request->post()) && $projects->validate()) {
      $projects->save();
      return $this->redirect(['projects/index']);
    }
    return $this->render('new', ['model' => $projects]);
  }

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $projects_id = (int)$params['projects_id'];
    $projects = Projects::findOne(['id' => $projects_id]);

    return $this->render('show', ['model' => $projects]);

  }

  public function actionDelete(){
      $params = Yii::$app->request->queryParams;
      $projects_id = (int)$params['projects_id'];
      $projects = Projects::findOne(['id'=> $projects_id]);
      $projects->delete();
      return $this->redirect(['projects/index']);
  }

  public function actionUpdate(){
    $params = Yii::$app->request->queryParams;
    $projects_id = (int)$params['projects_id'];
    $projects = Projects::findOne(['id' => $projects_id]);

    if ($projects->load(Yii::$app->request->post()) && $projects->validate()) {
      $projects->update();
      return $this->redirect(['projects/index']);
    }
    return $this->render('edit', ['model' => $projects]);
  }

  private function get_records(){
   $projects = Projects::find();
   $params = Yii::$app->request->queryParams;

    if(isSet($params['search_field'])){
      $projects = $projects->where(['like', 'title', '%'. $params['search_field'].'%', false]);
    }
    return $projects->orderBy('begin_date desc')->all();
  }
}



