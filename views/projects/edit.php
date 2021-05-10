<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'projects']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Editar projeto</div>
    <div>
      <?php $form = ActiveForm::begin([
        'action' => ['projects/update', 'projects_id' => $model->id],
        'id' => 'projects_edit'
      ]); ?>
      <?= $this->render('form', ['model' => $model, 'form' => $form]);?>

      <div class="button_cancelar_alterar"><?= Html::submitButton('Alterar', ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/projects/index'], ['class'=>'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

  </div>

</div>
