<?php

use yii\helpers\Html; ?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'documents']);?>
    </div>
    <div class="col-lg">
      <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=documents/new']);?>
        <div id="document_list">
          <?= $this->render('_index', ['documents' => $documents]);?>
        </div>
    </div>

</div>

