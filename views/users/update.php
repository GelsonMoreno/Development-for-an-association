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
            <div class="sidephoto">
                <div class="form-password">
                    <label>Palavra-passe antiga</label><br>
                    <input class="label_indx1" name="Palavra-passe" placeholder="Palavra-passe"><br>
                    <label>Nova palavra-passe</label><br>
                    <input class="label_indx1" name="Nova palavra-passe" placeholder="Nova palavra-passe"><br>
                    <label>Confirmar palavra-passe</label><br>
                    <input class="label_indx1" name="Confirmar palavra-passe" placeholder="confirmar palavra-passe"><br>
                    <div class="button_cancelar_alterar"><?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']) ?>
                      <?= Html::a('Cancel', ['/users/settings'], ['class'=>'btn btn-primary']) ?>
                    </div>
                </div>
                <div class="photo"> <span>Foto de perfil</span></div>
            </div>
        </div>
    </div>

</div>



