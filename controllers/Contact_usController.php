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
    $contact_us = $this->get_records();
    $error = '';
    $params = Yii::$app->request->queryParams;
    if(isset($params['error']) && $params['error']=='1'){
      $error = 'Não foi possivel apagar este registo!';
    }
    return $this->render('index',['contact_us' => $contact_us, 'error' => $error]);

  }

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $contact_us_id = (int)$params['contact_us_id'];
    $contact_us = Contact_us::findOne(['id'=> $contact_us_id]);
    $sucess_sent = false;
    if(isset($params['sucess_sent'])){
      $sucess_sent = true;
    }

    return $this->render('show', ['model'=>$contact_us, 'sucess_sent' => $sucess_sent]);

  }

  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $contact_us_id = (int)$params['contact_us_id'];
    $contact_us = Contact_us::findOne(['id'=> $contact_us_id]);

    $error = '';
    try{
      $contact_us->destroyWithMessage();

    } catch (\yii\db\Exception $e){
      $error = '1';
    }

    return $this->redirect(['contact_us/index', 'error' => $error]);
  }

  private function get_records() {
    $contact_us = Contact_us::find();
    $params = Yii::$app->request->queryParams;

    if(isSet($params['search_field'])){
      $contact_us = $contact_us->where(['like', 'name', '%'. $params['search_field'].'%', false]);
    }

    return $contact_us->orderBy('create_at desc')->all();
  }
}