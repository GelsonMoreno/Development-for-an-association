<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<div class='row'>
    <div class="col-sm">
      <?= $this->render('../shared/left_column', ['active' => 'documents']);?>
    </div>
    <div class="col-lg">

        <div>Detalhe do documento</div>
        <div><?= $model->title ?></div>
        <div>
            <a href="<?= $model->documentUrlForDownload() ?>">document</a>
        </div>

    </div>

</div>