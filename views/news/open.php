<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>

<div class="teste450" style="width: 800px; margin: 0 auto;">
    <div class="col-lg">
        <div class="wall_title_blue">Detalhe da Notícia</div>
        <div class="form-group">
            <label>Título</label><br>
            <div class="label_indx"><?= $model->title ?></div>
            <label>Texto</label><br>
            <div class="text"><?= $model->text ?></div>
        </div>
    </div>
</div>

