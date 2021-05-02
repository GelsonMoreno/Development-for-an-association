<?php


namespace app\controllers;
use app\models\User;
use Yii;
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

  public function actionSettings(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $users = $this->get_records();
    return $this->render('settings', ['users' => $users]);
  }

  public function actionChange_data(){
    if (\Yii::$app->user->isGuest){
        return $this->goHome();
    }
    $users = $this->get_records();
    return $this->render('modify_data', ['users' => $users]);
  }

    public function actionProfile(){
        if (\Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $users = $this->get_records();
        return $this->render('profile', ['users' => $users]);
    }

  private function get_records() {
    //$documents = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    $params = Yii::$app->request->queryParams;
    $users = User::find();

    if(isSet($params['filter_users'])){
      $users = $users->where(['User_types_id' => (int)$params['filter_users']]);
    }

    if(isSet($params['search_field']) && $params['search_field'] != ''){
      $users = $users->where(['like', 'name', $params['search_field'].'%', false]);
    }

    return $users->orderBy('id')->all();
  }
}
