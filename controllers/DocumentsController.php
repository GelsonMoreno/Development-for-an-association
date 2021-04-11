<?php


namespace app\controllers;


use app\models\Documents;
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
      $documents->save();
      $documents->file->saveAs(Yii::$app->basePath . '/upload/' . 'document_' . $documents->id . '_' . $documents->file->baseName . '.' . $documents->file->extension);
      return $this->redirect(['documents/index']);
    }

    return $this->render('new', ['model'=>$documents]);
  }

  public function actionUpdate(){
    $params = Yii::$app->request->queryParams;
    $document_id = (int)$params['document_id'];
    $documents = Documents::findOne(['id' => $document_id]);

    if($documents->load(Yii::$app->request->post()) && $documents->validate()){
      if($documents->file == '' or $documents->file == Null){
        $documents->setPreviousFile();
      }
      $documents->update();
      return $this->redirect(['documents/index']);
    }

    return $this->render('edit', ['model'=>$documents]);
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

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $document_id = (int)$params['document_id'];
    $document = Documents::findOne(['id'=> $document_id]);

    return $this->render('show', ['model'=>$document]);

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
    //$documents = Documents::find()->where(['Users_id' => \Yii::$app->user->identity->getId()])->orderBy('date desc')->all();
    return Documents::find()->orderBy('date desc')->all();
  }
}
