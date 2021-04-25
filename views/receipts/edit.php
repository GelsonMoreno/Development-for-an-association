<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'receipts']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Editar recebimento</div>
    <div>
      <?php $form = ActiveForm::begin([
        'action' => ['receipts/update', 'receipts_id' => $model->id],
        'id' => 'receipt_edit'
      ]); ?>
      <?= $this->render('form', ['model' => $model, 'projects' => $projects, 'companies'=> $companies, 'form' => $form]);?>

      <div class="button_cancelar_alterar"><?= Html::submitButton('Alterar', ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/receipts/index'], ['class'=>'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

  </div>

</div>
