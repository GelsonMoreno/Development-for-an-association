<?php


namespace app\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

class Associated extends Controller
{
    public function actionIndex(): Response|string
    {
        if (Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $associated = $this->get_records();
        return $this->render('index',['associated' => $associated]);

    }

    private function get_records()
    {
    }
}