<?php

namespace app\controllers;


  use app\models\Projects;
  use yii\web\Controller;

class ProjectsController extends Controller
{
  public function actionIndex()
  {
    if (\Yii::$app->user->isGuest) {
      return $this->goHome();
    }
    $projects = $this->get_records();
    return $this->render('index', ['projects' => $projects]);

  }

  private function get_records()
  {
    //$documents = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return Projects::find()->orderBy('begin_date desc')->all();
  }
}