<?php


namespace app\controllers;


use app\models\Payments;
use app\models\Projects;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;
use app\models\Companies;


class PaymentsController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $payments = $this->get_records();

   $total_money = Companies::findOne(['name' => 'TRANSTEC'])->balance;

      return $this->render('index',['payments' => $payments, 'total_money' => $total_money]);
  }

  private function get_records() {

    return Payments::find()->orderBy('create_at desc')->all();
  }

    public function actionNew(){
        $payments= new Payments();
        $projects = Projects::find()->all();
        if($payments->load(Yii::$app->request->post()) && $payments->validate()){
            $payments->setUserID();
            $payments->file = UploadedFile::getInstance($payments, 'file');
            $payments->create_at=date('Y-m-d H:i:s');

            if(Yii::$app->request->post()['Payments']['public'] == '') {
                $payments->public = '';
            } else {
                $payments->public = implode(',',Yii::$app->request->post()['Payments']['public']);
            }

            $payments->save();
            $company = Companies::findOne(['name' => 'TRANSTEC']);
            $company->updateBalance(-$payments->value);
            $payments->file->saveAs(Yii::$app->basePath . '/upload/' . 'payment_' . $payments->id . '_' . $payments->file->baseName . '.' . $payments->file->extension);
            return $this->redirect(['payments/index']);
        }

        return $this->render('new', ['model'=>$payments, 'projects' => $projects]);
    }

    public function actionShow(){
        $params = Yii::$app->request->queryParams;
        $payment_id = (int)$params['payment_id'];
        $payment = Payments::findOne(['id'=> $payment_id]);

        return $this->render('show', ['model'=>$payment]);

    }

    public function actionDownload(){
        $params = Yii::$app->request->queryParams;
        $payment_name = $params['payment_name'];
        $path = Yii::$app->basePath . '/upload/' . $payment_name;

        if (file_exists($path)) {
            $inline = false;
            if(isSet($params['inline'])){
                $inline = true;
            }

            return Yii::$app->response->sendFile($path, $payment_name, ['inline'=>$inline]);
        }

    }

    public function actionDelete(){
        $params = Yii::$app->request->queryParams;
        $payment_id = (int)$params['payment_id'];
        $payment = Payments::findOne(['id'=> $payment_id]);
        if($payment->delete()){
          $company = Companies::findOne(['name' => 'TRANSTEC']);
          $company->updateBalance($payment->value);
            $path = Yii::$app->basePath . '/upload/' . 'payment_' . $payment->id . '_' . $payment->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        return $this->redirect(['payments/index']);
    }

    public function actionUpdate(){
        $params = Yii::$app->request->queryParams;
        $payment_id = (int)$params['payment_id'];
        $payments = Payments::findOne(['id' => $payment_id]);
        $projects = Projects::find()->all();
      $current_value = $payments->value;

        if($payments->load(Yii::$app->request->post()) && $payments->validate()){
            if($payments->file == '' or $payments->file == Null){
                $payments->setPreviousFile();
            }

            if(Yii::$app->request->post()['Payments']['public'] == '') {
                $payments->public = '';
            } else {
                $payments->public = implode(',',Yii::$app->request->post()['Payments']['public']);
            }
            $payments->update_at=date('Y-m-d H:i:s');
            $company = Companies::findOne(['name' => 'TRANSTEC']);
            $company->updateBalance(-$payments->value + $current_value);
            $payments->update();
            return $this->redirect(['payments/index']);
        }

        return $this->render('edit', ['model'=>$payments, 'projects' => $projects]);
    }



}


