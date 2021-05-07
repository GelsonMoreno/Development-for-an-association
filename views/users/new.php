<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
    <div class="col-sm">
      <?= $this->render('../shared/left_column', ['active' => 'users']);?>
    </div>
    <div class="col-lg">

        <div class="wall_title_blue">Novo utilizador</div>
        <div>
          <?php $form = ActiveForm::begin([
            'action' => ['users/new'],
            'id' => 'user_new'
          ]); ?>
          <?= $this->render('form', ['model' => $model, 'form' => $form, 'users_types'=>$users_types]);?>

            <div class="button_cancelar_alterar"><?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']) ?>
              <?= Html::a('Cancel', ['/users/index'], ['class'=>'btn btn-primary']) ?>
            </div>
          <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>
