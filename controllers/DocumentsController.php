<?php


namespace app\controllers;
use app\models\Documents;
use app\models\User;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class DocumentsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $documents = $this->get_records();
    return $this->render('index',['documents' => $documents]);

  }

  public function actionNew(){
    $documents= new Documents();

    if($documents->load(Yii::$app->request->post()) && $documents->validate()){
      $documents->setUserID();
      $documents->file = UploadedFile::getInstance($documents, 'file');
      $documents->create_at=date('Y-m-d H:i:s');

      if(Yii::$app->request->post()['Documents']['public'] == '') {
        $documents->public = '';
      } else {
        $documents->public = implode(',',Yii::$app->request->post()['Documents']['public']);
      }

      $documents->save();
      $documents->file->saveAs(Yii::$app->basePath . '/upload/' . 'document_' . $documents->id . '_' . $documents->file->baseName . '.' . $documents->file->extension);
      return $this->redirect(['documents/index']);
    }

    return $this->render('new', ['model'=>$documents]);
  }

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $document_id = (int)$params['document_id'];
    $document = Documents::findOne(['id'=> $document_id]);

    return $this->render('show', ['model'=>$document]);

  }

  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $document_id = (int)$params['document_id'];
    $document = Documents::findOne(['id'=> $document_id]);
    if($document->delete()){
      $path = Yii::$app->basePath . '/upload/' . 'document_' . $document->id . '_' . $document->file;
      if (file_exists($path)) {
        unlink($path);
      }
    }

    return $this->redirect(['documents/index']);
  }

  public function actionUpdate(){
    $params = Yii::$app->request->queryParams;
    $document_id = (int)$params['document_id'];
    $documents = Documents::findOne(['id' => $document_id]);

    if($documents->load(Yii::$app->request->post()) && $documents->validate()){
      $documents->setPreviousFile();
      $current_file = UploadedFile::getInstance($documents, 'file');
      if($current_file){
        $path = Yii::$app->basePath . '/upload/' . 'document_' . $documents->id . '_' . $documents->file;
        if (file_exists($path)) {
          unlink($path);
        }
        $documents->file = $current_file;
        $documents->file->saveAs(Yii::$app->basePath . '/upload/' . 'document_' . $documents->id . '_' . $documents->file->baseName . '.' . $documents->file->extension);
      }

      $documents->update_at=date('Y-m-d H:i:s');
      if(Yii::$app->request->post()['Documents']['public'] == '') {
        $documents->public = '';
      } else {
        $documents->public = implode(',',Yii::$app->request->post()['Documents']['public']);
      }

      $documents->update();
      return $this->redirect(['documents/index']);
    }

    return $this->render('edit', ['model'=>$documents]);
  }

  public function actionDownload(){
    $params = Yii::$app->request->queryParams;
    $document_name = $params['document_name'];
    $path = Yii::$app->basePath . '/upload/' . $document_name;

    if (file_exists($path)) {
      $inline = false;
      if(isSet($params['inline'])){
        $inline = true;
      }

      return Yii::$app->response->sendFile($path, $document_name, ['inline'=>$inline]);
    }

  }

  private function get_records() {

    $documents = Documents::find();
    $params = Yii::$app->request->queryParams;

    if(isSet($params['search_field'])){
      $documents = $documents->where(['like', 'title', '%'. $params['search_field'].'%', false]);
    }

    if(!Yii::$app->user->identity->isAdmin()){
      $documents = $documents->where(['like', 'public', '%'. Yii::$app->user->identity->User_types_id .'%', false]);
    }
    if(Yii::$app->user->identity->isAssociated()){
      $documents = $documents->where(['Users_id' => \Yii::$app->user->identity->getId()]);
    }
    return $documents->orderBy('create_at desc')->all();
  }
}