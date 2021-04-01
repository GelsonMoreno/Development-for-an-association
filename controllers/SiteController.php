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
        $news = News::find()->orderBY('date desc')->all();
        $contact_us = new Contact_us();
        $submitted = false;

        if($contact_us->load(Yii::$app->request->post()) && $contact_us->validate()){
          $submitted = true;
          $contact_us->save();
          $contact_us = new Contact_us;
        }
        return $this->render('index', ['model' =>$contact_us, 'submitted' => $submitted, 'news' => $news]);



    }

}
