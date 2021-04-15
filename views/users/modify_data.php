<?php

use yii\helpers\Html;

?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'settings']); ?>
    </div>

    <div class="col-lg">
        <div class="content_settings"  > <?= Html::img('img/settings.png') ;?> Definições </div>
        <div class="settings_head">

                <div class="modify_data">Alterar Dados</div>

            <div class="form-password">

                <label>Palavra-passe</label><br>
                <input class="label_indx1" name="Palavra-passe" placeholder="Palavra-passe"><br>
                <label>Nova palavra-passe</label><br>
                <input class="label_indx1" name="Nova palavra-passe" placeholder="Nova palavra-passe"><br>
                <label>Confirmar palavra-passe</label><br>
                <input class="label_indx1" name="Confirmar palavra-passe" placeholder="confirmar palavra-passe"><br>
                <label>Editar email</label><br>
                <input class="label_indx" name="Editar email" placeholder="Editar email"><br>
                <div class="photo"> </div>
                    <div class="button_cancelar_alterar">
                    <a href="" class="confirm" >Confirmar</a>
                    </div>

            </div>
        </div>
    </div>

</div>



