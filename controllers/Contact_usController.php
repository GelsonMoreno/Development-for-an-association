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
    $contac_us = Contact_us::find();
    $params = Yii::$app->request->queryParams;

    if(isSet($params['search_field'])){
      $contac_us = $contac_us->where(['like', 'name', '%'. $params['search_field'].'%', false]);
    }

    return $contac_us->orderBy('date desc')->all();
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