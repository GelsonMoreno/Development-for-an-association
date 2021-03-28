<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>

<div id="login_form">
  <?php $form = ActiveForm::begin([
          'action' => ['login/login'],
          'id' => 'login-form',
          'fieldConfig' => [
            'options' => [
            'tag' => false
            ],
            'template' => '{label}{input}',
    ],
  ]); ?>
      <?= $form->field($model, 'name',['inputOptions'=>['id'=> 'user_id', 'class' => ''], 'labelOptions'=>['class'=>'']])->textInput(['autofocus' => true]) ?>

      <?= $form->field($model, 'password', ['inputOptions' =>['id'=>'user_password', 'type'=>'password', 'class'=>''],'labelOptions'=>['class'=>'']])->passwordInput() ?>

      <?= Html::submitButton('Login', ['class' => '', 'name' => 'login-button', 'id'=>'login_button']) ?>
  <?php ActiveForm::end(); ?>


  <!--<form action="#">
    <label for="user_id">ID do Usuario</label>
    <input id="user_id" type="text">
    <label for="user_password">Senha</label>
    <input id="user_password" type="password">
    <button id="login_button" type="submit">Login </button>
  </form>-->
</div>
