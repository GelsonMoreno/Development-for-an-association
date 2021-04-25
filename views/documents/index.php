<?php

use yii\helpers\Html; ?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'documents']);?>
    </div>
    <div class="col-lg">
      <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=documents/new']);?>
        <table id="t01">
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data de criação</th>
                <th>Tipo</th>
                <th></th>
            </tr>
          <?php foreach ($documents as $document_data): ?>
              <tr>
                  <td><?= $document_data->title ?></td>
                  <td> <?= yii\helpers\BaseStringHelper::truncate($document_data->description, 40) ?></td>
                  <td><?= $document_data->create_at ?></td>
                  <td><?= $document_data->type ?></td>
                  <td class="td_button">
                      <a href="/index.php?r=documents/show&document_id=<?= $document_data->id ?>"><i class="bi bi-eye-fill"></i></a>
                      <a href="<?= $document_data->documentUrlForDownload() . '&inline=true' ?>" target="_blank"><i class="bi bi-file-earmark-text-fill"></i></a>
                      <a href="/index.php?r=documents/update&document_id=<?= $document_data->id ?>">
                          <i class="bi bi-pen-fill"></i>
                      </a>
                      <a href="/index.php?r=documents/delete&document_id=<?= $document_data->id ?>" data-confirm="Are you sure?">
                          <i class="bi bi-trash-fill"></i>
                      </a>
                  </td>
              </tr>
          <?php endforeach;?>
        </table>
    </div>
</div>

