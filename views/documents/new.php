<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'documents']);?>
    </div>
    <div class="col-lg">

        <div>Novo Documento</div>
        <div>
          <?php $form = ActiveForm::begin([
            'action' => ['documents/new'],
            'id' => 'document_new'
          ]); ?>
          <?= $this->render('form', ['model' => $model, 'form' => $form]);?>

          <?= Html::submitButton('Guardar') ?>
          <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>
