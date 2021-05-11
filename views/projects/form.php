<?php
use \app\models\User_types;
use \yii\helpers\ArrayHelper;

?>
<?= $form->field($model, 'title', ['inputOptions'=> ['class'=>'label_indx']]) ?>

<?= $form->field($model, 'address', ['inputOptions'=> ['class'=>'label_indx']])->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'state', ['inputOptions'=> ['class'=>'label_indx1']])->dropDownList(['Em planejamento'=>'Em planejamento','Em andamento'=>'Em andamento','Finalizado'=>'Finalizado'],['prompt' => 'Selecionar estado do projeto']) ?>

<?= $form->field($model, 'value', ['inputOptions'=> ['class'=>'label_indx1']]) ?>

<?= $form->field($model, 'begin_date', ['inputOptions'=> ['class'=>'label_indx1']]) ?>

<?= $form->field($model, 'end_date', ['inputOptions'=> ['class'=>'label_indx1']]) ?>




<?= $form->field($model, 'description', ['inputOptions'=> ['class'=>'description']])->textarea() ?>



