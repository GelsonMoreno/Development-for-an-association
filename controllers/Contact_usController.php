<?php


namespace app\controllers;

use Yii;
use app\models\Contact_us;
use yii\web\Controller;


class Contact_usController extends Controller
{

  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $contac_us = $this->get_records();
    return $this->render('index',['contact_us' => $contac_us]);

  }
  private function get_records() {
    //$payments = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return Contact_us::find()->orderBy('date desc')->all();
  }

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $contact_us_id = (int)$params['contact_us_id'];
    $contact_us = Contact_us::findOne(['id'=> $contact_us_id]);

    return $this->render('show', ['model'=>$contact_us]);

  }

  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $contact_us_id = (int)$params['contact_us_id'];
    $contact_us = Contact_us::findOne(['id'=> $contact_us_id]);
    $contact_us->delete();

    return $this->redirect(['contact_us/index']);
  }
}