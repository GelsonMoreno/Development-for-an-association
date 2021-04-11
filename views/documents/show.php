<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
    <div class="col-sm">
      <?= $this->render('../shared/left_column', ['active' => 'documents']);?>
    </div>
    <div class="col-lg">

        <div class="wall_title_blue">Detalhe do documento</div>
        <div class="form-group">
            <label>Título</label><br>
            <div class="label_indx"><?= $model->title ?></div>
            <label>Tipo</label><br>
            <div class="label_indx1"><?= $model->type ?></div>
            <label>Data</label><br>
            <div class="label_indx1"><?= $model->date ?></div>
            <label>Descrição</label><br>
            <div class="description"><?= $model->description ?></div>
            <label>File</label><br>
            <div class="file_button">
                 <div class="label_indx1">
                     <a href="<?= $model->documentUrlForDownload() ?>"><i class="bi bi-file-earmark-text-fill"></i>Documento</a>
                 </div>
            </div>
            <div class="button_cancelar_alterar">
              <?= Html::a('Voltar', ['/documents/index'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>


    </div>

</div>