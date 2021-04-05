<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'documents']);?>
  </div>
  <div class="col-lg">

    <div>Editar Documento</div>
    <div>
      <?php $form = ActiveForm::begin([
        'action' => ['documents/update', 'document_id' => $model->id],
        'id' => 'document_edit'
      ]); ?>
      <?= $this->render('form', ['model' => $model, 'form' => $form]);?>

      <?= Html::submitButton('Alterar') ?>
      <?= Html::a('Cancel', ['/documents/index'], ['class'=>'btn btn-primary']) ?>
      <?php ActiveForm::end(); ?>
    </div>

  </div>

</div>
