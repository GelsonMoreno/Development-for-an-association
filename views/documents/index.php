<?php
use yii\helpers\BaseStringHelper;
?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column');?>
    </div>

    <div class="col-lg">
      <?= $this->render('../shared/content_header');?>
        <table id="t01">
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Tipo</th>
                <th></th>
            </tr>
          <?php foreach ($documents as $document_data): ?>
            <tr>
                <td><?= $document_data->title ?></td>
                <td> <?= yii\helpers\BaseStringHelper::truncate( $document_data->description, 40) ?></td>
                <td><?= $document_data->date ?></td>
                <td><?= $document_data->type ?></td>
                <td class="td_button">
                    <a href="#"><i class="bi bi-file-earmark-text-fill"></i></a>
                    <a href="#"><i class="bi bi-arrow-down"></i></a>
                    <a href="#"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
          <?php endforeach;?>
        </table>
    </div>

</div>

