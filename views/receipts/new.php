<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'receipts']);?>
    </div>
    <div class="col-lg">

        <div class="wall_title_blue">Novo recebimento</div>
        <div>
          <?php $form = ActiveForm::begin([
            'action' => ['receipts/new'],
            'id' => 'receipt_new'
          ]); ?>
          <?= $this->render('form', ['model' => $model, 'form' => $form, 'projects'=>$projects, 'companies'=>$companies]);?>

            <div class="button_cancelar_alterar"><?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']) ?>
              <?= Html::a('Cancel', ['/receipts/index'], ['class'=>'btn btn-primary']) ?>
            </div>
          <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>
