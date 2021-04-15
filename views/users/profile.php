<?php

use yii\helpers\Html;

?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'profile']); ?>
    </div>

    <div class="col-lg">
        <div class="content_settings"> <?= Html::img('img/images.png') ;?> Dados do usuário </div>
        <div class="settings_head">
            <div class="photo"> </div>

            <div class="form-password">
                <label>Nome</label><br>
                <div class="label_indx1"></div>
                <label>Telefone</label><br>
                <div class="label_indx1"></div>
                <label>Nif</label><br>
                <div class="label_indx1"></div>
                <label>Email</label><br>
                <div class="label_indx"></div>
            </div>

        </div>
    </div>
</div>