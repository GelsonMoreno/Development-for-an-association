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
    return $this->render('index', ['receipts' => $receipts]);

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

  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $receipt_id = (int)$params['receipts_id'];
    $receipts = Receipts::findOne(['id'=> $receipt_id]);
    if($receipts->delete()){
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

    if($receipts->load(Yii::$app->request->post()) && $receipts->validate()){
      if($receipts->file == '' or $receipts->file == Null){
        $receipts->setPreviousFile();
      }

      $receipts->update_at=date('Y-m-d H:i:s');
      if(Yii::$app->request->post()['Receipts']['public'] == '') {
        $receipts->public = '';
      } else {
        $receipts->public = implode(',',Yii::$app->request->post()['Receipts']['public']);
      }

      $receipts->update_at=date('Y-m-d H:i:s');
      $receipts->update();
      return $this->redirect(['receipts/index']);
    }

    return $this->render('edit', ['model'=>$receipts, 'projects' => $projects, 'companies' => $companies]);
  }

  private function get_records() {
    $receipts = Receipts::find();
    $params = Yii::$app->request->queryParams;

    if(isSet($params['search_field'])){
      $receipts = $receipts->where(['like', 'title', '%'. $params['search_field'].'%', false]);
    }

    if(!Yii::$app->user->identity->isAdmin()){
      $receipts = $receipts->where(['like', 'public', '%'. Yii::$app->user->identity->User_types_id .'%', false]);
    }

    return $receipts->orderBy('create_at desc')->all();
  }


}