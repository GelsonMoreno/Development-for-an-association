<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
    <div class="col-sm">
      <?= $this->render('../shared/left_column', ['active' => 'receipts']);?>
    </div>
    <div class="col-lg">

        <div class="wall_title_blue">Detalhe do recebimento</div>
        <div class="form-group">
            <label>Título</label><br>
            <div class="label_indx"><?= $model->title ?></div>
            <label>Endereço</label><br>
            <div class="label_indx"><?= $model->address ?></div>
            <label>Valor(€)</label><br>
            <div class="label_indx1"><?= $model->value ?></div>
            <label>Projeto</label><br>
            <div class="label_indx1"><?= $model->getProject()->title ?></div>
            <label>Empresa</label><br>
            <div class="label_indx1"><?= $model->getCompanies()->name ?></div>
            <label>Tipo</label><br>
            <div class="label_indx1"><?= $model->type ?></div>
            <label>Data de criação</label><br>
            <div class="label_indx1"><?= $model->create_at ?></div>
            <label>Data de modificação</label><br>
            <div class="label_indx1"><?= $model->update_at ?></div>
            <label>Descrição</label><br>
            <div class="description"><?= $model->description ?></div>
            <label>File</label><br>
            <div class="file_button">
                <div class="label_indx1">
                    <a href="<?= $model->receiptUrlForDownload() ?>"><i class="bi bi-file-earmark-text-fill"></i>Documento</a>
                </div>
            </div>
            <div class="button_cancelar_alterar">
              <?= Html::a('Voltar', ['/receipts/index'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>


    </div>

</div>