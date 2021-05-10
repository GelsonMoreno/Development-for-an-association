<?php


namespace app\controllers;
use app\models\User;
use app\models\User_types;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

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

  public function actionNew(){
    $users = new User();
    $users_types = User_types::find()->all();

    if($users->load(Yii::$app->request->post()) && $users->validate()){
      $users->create_at = date('Y-m-d H:i:s');

      $users->image = UploadedFile::getInstance($users, 'image');
      $users->save();
      $users->image->saveAs(Yii::$app->basePath . '/web/img/upload/' . 'user_' . $users->id . '_' . $users->image->baseName . '.' . $users->image->extension);

      return $this->redirect(['users/index']);
    }
    return $this->render('new', ['model' => $users, 'users_types' => $users_types]);
  }

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $users_id = (int)$params['users_id'];
    $users = User::findOne(['id'=> $users_id]);
    return $this->render('show', ['model'=>$users]);
  }

  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $users_id = (int)$params['users_id'];
    $users = User::findOne(['id'=> $users_id]);
    if($users->delete()){
      $path = Yii::$app->basePath . '/web/img/upload/' . 'user_' . $users->id . '_' . $users->image ;
      if (file_exists($path)) {
        unlink($path);
      }
    }
    return $this->redirect(['users/index']);
  }

  public function actionUpdate(){
    $params = Yii::$app->request->queryParams;
    $users_id = (int)$params['users_id'];
    $users = User::findOne(['id'=> $users_id]);
    $users_types = User_types::find()->all();

    if($users->load(Yii::$app->request->post()) && $users->validate()){
      if($users->image == '' or $users->image == Null){
        $users->setPreviousImage();
      }
      $users->update_at=date('Y-m-d H:i:s');
      $users->update();
      return $this->redirect(['users/index']);
    }
    return $this->render('edit', ['model'=>$users, 'users_types' => $users_types]);
  }

  public function actionSettings(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $users = $this->get_records();
    return $this->render('settings', ['model' => $users]);
  }

  public function actionPassword(){
    $users = User::findOne(['id'=> Yii::$app->user->identity->getId()]);
    $post_params = Yii::$app->request->post();
    $password_changed = false;
    $error = "";

    if($post_params){
      if($post_params['current_password'] == $users->password){
        if($post_params['new_password'] != "" && $post_params['new_password'] == $post_params['password_confirm']){
          $users->updateAttributes(['password' => $post_params['new_password']]);
          $password_changed = true;
        } else {
          $error = "O password não coicidem!";
        }
      } else {
        $error = "O password atual não está correto!";
      }
    }

    if($password_changed){
      return $this->redirect(['users/show' , 'users_id' => $users->id]);
    } else {
      return $this->render('update', ['model' => $users, 'error' => $error]);
    }
  }

    /*public function actionProfile(){
        if (\Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $users = $this->get_records();
        return $this->render('show', ['model' => $users]);
    }*/

  private function get_records() {
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
