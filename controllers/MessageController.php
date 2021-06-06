<?php


namespace app\controllers;

use Yii;
use app\models\Message;
use yii\web\Controller;

class MessageController extends Controller
{
  public function actionIndex(){
    if (\Yii::$app->user->isGuest){
      return $this->goHome();
    }
    $message = $this->get_records();
    return $this->render('index',['message' => $message]);

  }

  public function actionNew(){
    $message= new Message();

    $params = Yii::$app->request->queryParams;
    $message->Contact_us_id = $params['contact_us_id'];
    $message->setUserID();

    if($message->load(Yii::$app->request->post()) && $message->validate()){
      $message->create_at=date('Y-m-d H:i:s');
      $message->save();
      $this->sendMail($message);
      $contactUs = $message->getContactUs();
      $contactUs->state = "Respondido";
      $contactUs->save();
      return $this->redirect(['message/index']);
    }

    return $this->render('new', ['model'=>$message]);
  }

  public function actionShow(){
    $params = Yii::$app->request->queryParams;
    $message_id = (int)$params['message_id'];
    $message = Message::findOne(['id'=> $message_id]);

    return $this->render('show', ['model'=>$message]);

  }

  public function actionDelete(){
    $params = Yii::$app->request->queryParams;
    $message_id = (int)$params['message_id'];
    $message = Message::findOne(['id'=> $message_id]);
    $message->delete();

    return $this->redirect(['contact_us/index']);
  }


  #todo: Maybe one day pass this to his own file;
  private  function sendMail($message){
    $response = '';
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("gelsonmoreno105@gmail.com","Transtec");
    $email->setSubject($message->title);
    $email->addTo($message->getContactUs()->email , $message->getContactUs()->name, [$message->getContactUs()->name => $message->getContactUs()->name]);
    $email->addSubstitution("subject", $message->title);
    $email->addSubstitution("content", $message->text);

    #todo: Maybe one day pass this to a config file
    $email->setTemplateId("d-a71f5e3f0cb3401cb3b54efd2bfcf59b");
    $sendgrid = new \SendGrid("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");

    try {
      $response = $sendgrid->send($email);
      echo $response->body();
    } catch (Exception $e) {
      echo 'Caught exception: '.  $e->getMessage(). "\n";
    }

  }

  private function get_records() {
    $message = Message::find();
    $params = Yii::$app->request->queryParams;

    if(isSet($params['search_field'])){
      $message = $message->where(['like', 'title', '%'. $params['search_field'].'%', false]);
    }

    return $message->orderBy('create_at desc')->all();
  }

}