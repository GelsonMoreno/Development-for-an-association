<?php

namespace app\controllers;

use app\models\Contact_us;
use app\models\LoginForm;
use app\models\News;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

      if (!\Yii::$app->user->isGuest){
        return $this->redirect(['documents/index']);
      }
        $this->view->params['login_form'] = new LoginForm();
        $news = News::find()->orderBY('create_at desc')->all();
        $contact_us = new Contact_us();
        $contact_us->state = "Não respondido";
        $submitted = false;

        $params = Yii::$app->request->queryParams;

        $login_error = isset($params['login_error']) ? 'Desculpa, mas o teu email ou a senha não estão corretas.Verifica e tenta novamente.': '';

        if($contact_us->load(Yii::$app->request->post()) && $contact_us->validate()){
          $submitted = true;
          $contact_us->create_at=date('Y-m-d H:i:s');
          $contact_us->save();
          $contact_us = new Contact_us;
        }

        $viewdata = [
          'model' => $contact_us,
          'submitted' => $submitted,
          'news' => $news,
          'error' => $login_error
        ];


        return $this->render('index', $viewdata);



    }

}
