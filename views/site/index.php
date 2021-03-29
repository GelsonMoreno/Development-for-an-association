<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>

<div class='row'>
    <div class='column'>
        <div class='blue-column'>
           <div class="wall_title_blue">Contact Us</div>
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name', ['inputOptions'=> ['class'=>'label_indx', 'placeholder' => 'Insira o seu nome']]) ?>
                <?= $form->field($model, 'email', ['inputOptions'=> ['class'=>'label_indx', 'placeholder' => 'Insira o seu email']]) ?>
                <?= $form->field($model, 'number' , ['inputOptions'=> ['class'=>'label_indx1', 'placeholder' => 'Insira o seu número']]) ?>
                <?= $form->field($model, 'description', ['inputOptions'=> ['class'=>'description', 'placeholder' => 'Insira uma descrição']])->textarea() ?>
                <?= Html::submitButton('Enviar', ['class'=> 'enviar_indx']) ?>
            <?php ActiveForm::end(); ?>

            <?php if($submitted): ?>
                <div>
                    Foi submetido
                </div>
            <?php endif; ?>
            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
        </div>
    </div>
    <div class='column'>
        <div class='green-column'>
           <div class="wall_title_green">Notícias</div>
          <?= Html::img('img/logo.png', $options = ['class'=>'imgIndexNews']); ?>
           <ul class="main-content_news">
            <?php foreach ($news as $news_data): ?>
                <li>
                    <h3 class="title_news"><?= Html::img('img/seta.png', $options = ['class'=>'imgIndexSeta']); ?><?= $news_data->title ?></h3>
                    <p class="description_news"><?= $news_data->text ?></p>
                </li>
            <?php endforeach;?>
           </ul>
        </div>
    </div>
</div>
