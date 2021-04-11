<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'documents']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Editar Documento</div>
    <div>
      <?php $form = ActiveForm::begin([
        'action' => ['documents/update', 'document_id' => $model->id],
        'id' => 'document_edit'
      ]); ?>
      <?= $this->render('form', ['model' => $model, 'form' => $form]);?>

      <div class="button_cancelar_alterar"><?= Html::submitButton('Alterar', ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/documents/index'], ['class'=>'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

  </div>

</div>
