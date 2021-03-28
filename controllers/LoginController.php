<?php
namespace app\controllers;
use app\models\LoginForm;
use Yii;

use yii\web\Controller;



class LoginController extends Controller
{
  /**
   * Login action.
   *
   * @return Response|string
   */
  public function actionLogin()
  {

    if (!Yii::$app->user->isGuest)
    {
      return $this->goHome();
    }

    $model = new LoginForm();

    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->redirect(['documents/index']); // Colocar aqui a path que o user deve ir apos o login
    }

    return $this->goHome(); // Colocar aqui o que fazer caso o user não conseguir logar
  }

  /**
   * Logout action.
   *
   * @return Response
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }

}