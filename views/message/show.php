<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'message']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Detalhe do email</div>
    <div class="form-group">
      <label>Assunto</label><br>
      <div class="label_indx"><?= $model->title ?></div>
        <label>Descrição</label><br>
        <div class="description"><?= $model->text ?></div>
        <label>Enviado por</label><br>
        <div class="label_indx1"><?= $model->getUserName()->name ?></div>
        <label>Data</label><br>
        <div class="label_indx1"><?= $model->create_at ?></div>

      <div class="button_cancelar_alterar">
        <?= Html::a('Voltar', ['/message/index'], ['class'=>'btn btn-primary']) ?>

      </div>
    </div>


  </div>

</div>
