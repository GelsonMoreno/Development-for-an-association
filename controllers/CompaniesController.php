<?php

namespace app\controllers;

use app\models\Companies;
use yii\web\Controller;
use app\models\User;
use YII;


class CompaniesController extends Controller
{
    public function actionIndex(){
      if (\Yii::$app->user->isGuest) {
          return $this->goHome();
      }
      $companies = $this->get_records();
      $error = '';
      $params = Yii::$app->request->queryParams;
      if(isset($params['error']) && $params['error']=='1'){
        $error = 'Desculpa. Não é possivel apagar este registo no momento!';
      }

      return $this->render('index', ['companies' => $companies, 'error'=> $error]);

    }

    public function actionNew(){
        $companies = new Companies();
        if($companies->load(Yii::$app->request->post()) && $companies->validate()) {
            $companies->save();
            return $this->redirect(['companies/index']);
        }
        return $this->render('new', ['model' => $companies]);
    }

    public function actionUpdate(){
        $params = Yii::$app->request->queryParams;
        $companies_id = (int)$params['companies_id'];
        $companies = Companies::findOne(['id' => $companies_id]);

        if ($companies->load(Yii::$app->request->post()) && $companies->validate()) {
            $companies->update();
            return $this->redirect(['companies/index']);
        }
        return $this->render('edit', ['model' => $companies]);
    }

    public function actionDelete(){
        $params = Yii::$app->request->queryParams;
        $companies_id = (int)$params['companies_id'];
        $companies = Companies::findOne(['id'=> $companies_id]);
        $error = '';
        try {
          $companies->delete();
        }catch (\yii\db\Exception $e){
          $error = '1';
        }
        return $this->redirect(['companies/index', 'error'=> $error]);
    }

    private function get_records(){
      $companies = Companies::find();
      $params = Yii::$app->request->queryParams;

      if(isSet($params['search_field'])){
        $companies = $companies->where(['like', 'name', '%'. $params['search_field'].'%', false]);
      }

      return $companies->orderBy('name')->all();
    }
}
