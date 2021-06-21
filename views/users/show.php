<?php

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;

?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'users']); ?>
    </div>

    <div class="col-lg">
        <div class="content_settings"> <?= Html::img('img/images.png') ;?> Dados do usuário </div>
        <div class="settings_head">
            <div class="modify_data">Perfil</div>

            <div class="sidephoto">
                <div class="form-password">
                    <label>Nome</label><br>
                    <div class="label_indx"><?= $model->name ?></div>
                    <label>Email</label><br>
                    <div class="label_indx"><?= $model->email ?></div>
                    <label>Endereço</label><br>
                    <div class="label_indx"><?= $model->address ?></div>
                    <label>Telefone</label><br>
                    <div class="label_indx1"><?= $model->number ?></div>
                    <label>Nif</label><br>
                    <div class="label_indx1"><?= $model->nif ?></div>
                    <label>Tipo de utilizador</label><br>
                    <div class="label_indx1"><?= $model->getUserType()->designation ?></div>
                    <?php if (!$model->isAssociated()):?>
                    <label>Data de criação</label><br>
                    <div class="label_indx1"><?= $model->create_at ?></div>
                    <label>Data de modificação</label><br>
                    <div class="label_indx1"><?= $model->update_at ?></div>
                    <label>Sexo</label><br>
                    <div class="label_indx1"><?= $model->sex ?></div>
                    <label>Data de nascimento</label><br>
                    <div class="label_indx1"><?= $model->birth_date ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-img">
                  <?php $form = ActiveForm::begin([
                    'action' => ['users/show', 'users_id' => $model->id],
                    'id' => 'user_new'
                  ]); ?>
                        <div class="photo">
                            <img id="div_img_tag" src="<?= $model->getUserImg() ?>" onerror="this.src='img/Profile1.png';"/>
                        </div>
                    <?= $form->field($model, 'image', ['inputOptions'=> ['style'=>["display" => "none"]]])->fileInput() ?>
                    <?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']) ?>
                    <?= Html::a('Eliminar', ['/users/show', 'users_id' => $model->id, 'deleteUserImage'=> true], ['class'=>'btn btn-primary']) ?>
                  <?php ActiveForm::end(); ?>
                </div>
                <script>
                    const imageDiv = document.querySelector('.photo');
                    const imageInput = document.querySelector('#user-image');
                    imageDiv.onclick = () => {
                        imageInput.click();
                    };
                    imageInput.onchange = function() {
                        const imgTag = document.querySelector('#div_img_tag');
                        imgTag.src = this.value === '' ? 'img/Profile1.png' : URL.createObjectURL(this.files[0]);
                    };
                </script>
            </div>
            <div class="button_cancelar_alterar">
              <?= Html::a('Voltar', ['/users/index'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>