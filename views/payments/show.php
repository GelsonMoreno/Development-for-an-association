<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'payments']);?>
    </div>
    <div class="col-lg">

        <div class="wall_title_blue">Detalhe do pagamento</div>
        <div class="form-group">
            <label>Endereço</label><br>
            <div class="label_indx"><?= $model->address ?></div>
            <label>Valor(€)</label><br>
            <div class="label_indx1"><?= $model->value ?></div>
            <label>Metodo de pagamento</label><br>
            <div class="label_indx1"><?= $model->payment_type ?></div>
            <label>Projetos</label><br>
            <div class="label_indx1"><?= $model->getProject()->title ?></div>
            <label>Data de criação</label><br>
            <div class="label_indx1"><?= $model->create_at ?></div>
            <label>Data de modificação</label><br>
            <div class="label_indx1"><?= $model->update_at ?></div>
            <label>Tipo</label><br>
            <div class="label_indx1"><?= $model->type ?></div>
            <label>Descrição</label><br>
            <div class="description"><?= $model->description ?></div>
            <label>File</label><br>
            <div class="file_button">
                <div class="label_indx1">
                    <a href="<?= $model->paymentUrlForDownload() ?>"><i class="bi bi-file-earmark-text-fill"></i>Documento</a>
                </div>
            </div>
            <div class="button_cancelar_alterar">
                <?= Html::a('Voltar', ['/payments/index'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>


    </div>

</div>
