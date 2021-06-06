<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'message']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Nova mensagem</div>
    <div>
      <?php $form = ActiveForm::begin([
        'action' => ['message/new', 'contact_us_id'=> $model->Contact_us_id],
        'id' => 'messge_new'
      ]); ?>
      <?= $this->render('form', ['model' => $model, 'form' => $form]);?>

      <div class="button_cancelar_alterar"><?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/payments/index'], ['class'=>'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

  </div>

</div>

