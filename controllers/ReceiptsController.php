<?php


namespace app\controllers;
use app\models\Companies;
use app\models\Projects;
use Yii;
use app\models\Receipts;
use yii\web\Controller;
use yii\web\UploadedFile;

class ReceiptsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $receipts = $this->get_records();
    $total_money = Companies::findOne(['name' => 'TRANSTEC'])->balance;

    return $this->render('index', ['receipts' => $receipts, 'total_money' => $total_money]);
  }

  public function actionNew(){
    $receipts= new Receipts();
    $projects = Projects::find()->all();
    $companies = Companies::find()->all();
    if($receipts->load(Yii::$app->request->post()) && $receipts->validate()){
      $receipts->setUserID();
      $receipts->file = UploadedFile::getInstance($receipts, 'file');
      $receipts->create_at=date('Y-m-d H:i:s');

      if(Yii::$app->request->post()['Receipts']['public'] == '') {
        $receipts->public = '';
      } else {
        $receipts->public = implode(',',Yii::$app->request->post()['Receipts']['public']);
      }

      $receipts->save();
      $company = Companies::findOne(['id' => $receipts->Companies_id]);
      $company->updateBalance($receipts->value);
      $receipts->file->saveAs(Yii::$app->basePath . '/upload/' . 'receipt_' . $receipts->id . '_' . $receipts->file->baseName . '.' . $receipts->file->extension);
      return $this->redirect(['receipts/index']);
    }
    return $this->render('new', ['model'=>$receipts, 'projects' => $projects, 'companies'=> $companies]);
  }

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $receipts_id = (int)$params['receipts_id'];
    $receipts = Receipts::findOne(['id'=> $receipts_id]);
    return $this->render('show', ['model'=>$receipts]);

  }

  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $receipt_id = (int)$params['receipts_id'];
    $receipts = Receipts::findOne(['id'=> $receipt_id]);
    if($receipts->delete()){
      $company = Companies::findOne(['id' => $receipts->Companies_id]);
      $company->updateBalance(-$receipts->value);
      $path = Yii::$app->basePath . '/upload/' . 'receipt_' . $receipts->id . '_' . $receipts->file;
      if (file_exists($path)) {
        unlink($path);
      }
    }
    return $this->redirect(['receipts/index']);
  }

  public function actionUpdate(){
    $params = Yii::$app->request->queryParams;
    $receipt_id = (int)$params['receipts_id'];
    $receipts = Receipts::findOne(['id' => $receipt_id]);
    $projects = Projects::find()->all();
    $companies = Companies::find()->all();
    $current_value = $receipts->value;

    if($receipts->load(Yii::$app->request->post()) && $receipts->validate()){
      if($receipts->file == '' or $receipts->file == Null){
        $receipts->setPreviousFile();
        $current_file = UploadedFile::getInstance($receipts, 'file');
        if($current_file){
          $path = Yii::$app->basePath . '/upload/' . 'receipt_' . $receipts->id . '_' . $receipts->file;
          if (file_exists($path)) {
            unlink($path);
          }
          $receipts->file = $current_file;
          $receipts->file->saveAs(Yii::$app->basePath . '/upload/' . 'receipt_' . $receipts->id . '_' . $receipts->file->baseName . '.' . $receipts->file->extension);
        }
      }

      if(Yii::$app->request->post()['Receipts']['public'] == '') {
        $receipts->public = '';
      } else {
        $receipts->public = implode(',',Yii::$app->request->post()['Receipts']['public']);
      }

      $receipts->update_at=date('Y-m-d H:i:s');
      $company = Companies::findOne(['name' => 'TRANSTEC']);
      $company->updateBalance($receipts->value - $current_value);
      $receipts->update();

      return $this->redirect(['receipts/index']);
    }

    return $this->render('edit', ['model'=>$receipts, 'projects' => $projects, 'companies' => $companies]);
  }

  public function actionDownload(){
    $params = Yii::$app->request->queryParams;
    $receipts_name = $params['receipts_name'];
    $path = Yii::$app->basePath . '/upload/' . $receipts_name;

    if (file_exists($path)) {
      $inline = false;
      if(isSet($params['inline'])){
        $inline = true;
      }

      return Yii::$app->response->sendFile($path, $receipts_name, ['inline'=>$inline]);
    }

  }

  private function get_records() {
    $receipts = Receipts::find();
    $params = Yii::$app->request->queryParams;

    if(!Yii::$app->user->identity->isAdmin()){
      $receipts = $receipts->where(['like', 'public', '%'. Yii::$app->user->identity->User_types_id .'%', false]);
    }

    if(isSet($params['search_field'])){
      $receipts = $receipts->andWhere(['like', 'title', '%'. $params['search_field'].'%', false]);
    }

    return $receipts->orderBy('create_at desc')->all();
  }

}