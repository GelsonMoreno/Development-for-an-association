<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'contact_us']);?>
  </div>
  <div class="col-lg">

    <div class="wall_title_blue">Detalhe do contacto</div>
    <div class="form-group">
      <label>Título</label><br>
      <div class="label_indx"><?= $model->name ?></div>
      <label>Tipo</label><br>
      <div class="label_indx1"><?= $model->email ?></div>
        <label>Number</label><br>
        <div class="label_indx1"><?= $model->number ?></div>
        <label>Data</label><br>
        <div class="label_indx1"><?= $model->create_at ?></div>
      <label>Descrição</label><br>
      <div class="description"><?= $model->description ?></div>

      <div class="button_cancelar_alterar">
        <?php if($model->Message_id): ?>
            <?= Html::a('Ver mensagem', ['/message/show', 'message_id'=> $model->Message_id], ['class'=>'btn btn-primary']) ?>
        <?php else: ?>
          <?= Html::a('Responder', ['/message/new', 'contact_us_id'=> $model->id], ['class'=>'btn btn-primary']) ?>
        <?php endif; ?>
        <?= Html::a('Voltar', ['/contact_us/index'], ['class'=>'btn btn-primary']) ?>

      </div>
    </div>
  </div>
</div>
<?php if($sucess_sent): ?>
    <script>
        toastr.success('O seu email foi enviado com sucesso!!');
    </script>
<?php endif; ?>
