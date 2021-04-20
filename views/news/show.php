<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'news']);?>
  </div>
  <div class="col-lg">
      <div class="wall_title_blue">Detalhe do conteúdo</div>
      <div class="form-group">
      <label>Título</label><br>
      <div class="label_indx"><?= $model->title ?></div>
      <label>Data</label><br>
      <div class="label_indx1"><?= $model->date ?></div>
      <label>Texto</label><br>
      <div class="text"><?= $model->text ?></div>
      <div class="button_cancelar_alterar">
        <?= Html::a('Voltar', ['/news/index'], ['class'=>'btn btn-primary']) ?>
      </div>
    </div>
  </div>
</div>