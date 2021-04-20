<?php
?>


<?= $form->field($model, 'title', ['inputOptions'=> ['class'=>'label_indx']])->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'date', ['inputOptions'=> ['class'=>'label_indx1']]) ?>

<?= $form->field($model, 'text', ['inputOptions'=> ['class'=>'text']])->textarea() ?>

