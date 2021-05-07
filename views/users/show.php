<?php

use yii\helpers\Html;


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
                    <?php if (!Yii::$app->user->identity->isAssociated()):?>
                    <label>Data de criação</label><br>
                    <div class="label_indx1"><?= $model->create_at ?></div>
                    <label>Data de modificação</label><br>
                    <div class="label_indx1"><?= $model->update_at ?></div>
                    <label>Sexo</label><br>
                    <div class="label_indx1"><?= $model->sex ?></div>
                    <label>Data de nascimento</label><br>
                    <div class="label_indx1"><?= $model->birth_date ?></div>
                    <?php endif; ?>
                    <?php if(Yii::$app->user->identity->isAdmin()): ?>
                    <label>Palavra-Passe</label><br>
                    <div class="label_indx1"><?= $model->password ?></div>
                  <?php endif; ?>

                </div>
                <div class="photo"><?= Html::img($model->getUserImg()) ?> <span>Foto de perfil</span></div>

            </div>
            <div class="button_cancelar_alterar">
              <?= Html::a('Voltar', ['/users/index'], ['class'=>'btn btn-primary']) ?>
            </div>


        </div>
    </div>
</div>