<?php
use \app\models\User_types;
use \yii\helpers\ArrayHelper;

?>


<?= $form->field($model, 'title', ['inputOptions'=> ['class'=>'label_indx']])->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'text', ['inputOptions'=> ['class'=>'description']])->textarea() ?>




