<?php
?>


<?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'description') ?>

<?= $form->field($model, 'type') ?>

<?= $form->field($model, 'date') ?>

<?= $form->field($model, 'file')->fileInput() ?>
