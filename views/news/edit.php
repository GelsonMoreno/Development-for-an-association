<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'news']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Editar Conteúdo</div>
    <div>
      <?php $form = ActiveForm::begin([
        'action' => ['news/update', 'news_id' => $model->id],
        'id' => 'news_edit'
      ]); ?>
      <?= $this->render('form', ['model' => $model, 'form' => $form]);?>

      <div class="button_cancelar_alterar"><?= Html::submitButton('Alterar', ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['/news/index'], ['class'=>'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

  </div>

</div>
