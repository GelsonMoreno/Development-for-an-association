<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'payments']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Editar Pagamento</div>
    <div>
      <?php $form = ActiveForm::begin([
        'action' => ['payments/update', 'payment_id' => $model->id],
        'id' => 'payment_edit'
      ]); ?>
      <?= $this->render('form', ['model' => $model, 'form' => $form, 'projects' => $projects]);?>

      <div class="button_cancelar_alterar"><?= Html::submitButton('Alterar', ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/payments/index'], ['class'=>'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

  </div>

</div>
