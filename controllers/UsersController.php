<?php


namespace app\controllers;
use app\models\User;
use yii\web\Controller;

class UsersController extends Controller
{

  public function actionIndex()
  {
    if (\Yii::$app->user->isGuest) {
      return $this->goHome();
    }
    $users = $this->get_records();
    return $this->render('index', ['users' => $users]);
  }

  private function get_records() {
    //$documents = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return User::find()->orderBy('id')->all();
  }


}