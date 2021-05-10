<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>

<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'projects']);?>
    </div>
    <div class="col-lg">

        <div class="wall_title_blue">Detalhe do projeto</div>
        <div class="form-group">
            <label>Tittle</label><br>
            <div class="label_indx1"><?= $model->title ?></div>
            <label>Endereço</label><br>
            <div class="label_indx"><?= $model->address ?></div>
            <label>Valor(€)</label><br>
            <div class="label_indx1"><?= $model->value ?></div>
            <label>Data Inicial</label><br>
            <div class="label_indx1"><?= $model->begin_date ?></div>
            <label>Data Final</label><br>
            <div class="label_indx1"><?= $model->end_date ?></div>
            <label>Descrição</label><br>
            <div class="description"><?= $model->description ?></div>
            <div class="button_cancelar_alterar">
                <?= Html::a('Voltar', ['/projects/index'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>


    </div>

</div>