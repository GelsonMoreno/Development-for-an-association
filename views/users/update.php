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
            <form action="/index.php?r=users/password" method="post">
                <div class="form-password">
                  <?= Html::input('hidden',Yii::$app->request->csrfParam,Yii::$app->request->csrfToken)?>
                    <label>Palavra-passe antiga</label><br>
                    <input class="label_indx1" type="password" name="current_password" placeholder="Palavra-passe"><br>
                    <label>Nova palavra-passe</label><br>
                    <input class="label_indx1" type="password" name="new_password" placeholder="Nova palavra-passe"><br>
                    <label>Confirmar palavra-passe</label><br>
                    <input class="label_indx1" type="password" name="password_confirm" placeholder="confirmar palavra-passe"><br>
                    <div class="button_cancelar_alterar">
                      <?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']) ?>
                      <?= Html::a('Cancel', ['/users/settings'], ['class'=>'btn btn-primary']) ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php if($error != ''): ?>
    <!--<div><?= $error ?></div>-->
<script>
    toastr.warning('<?= $error ?>');
</script>
<?php endif; ?>

