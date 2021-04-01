<?php
?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'receipts']);?>
    </div>
    <div class="col-lg">
      <?= $this->render('../shared/content_header');?>
        <table id="t01">
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Valor(€)</th>
                <th>Local</th>
                <th></th>
            </tr>
          <?php foreach ($receipts as $receipts_data): ?>
              <tr>
                  <td><?= $receipts_data->title ?></td>
                  <td> <?= yii\helpers\BaseStringHelper::truncate($receipts_data->description, 40) ?></td>
                  <td><?= $receipts_data->date ?></td>
                  <td><?= $receipts_data->value ?></td>
                  <td><?= $receipts_data->address ?></td>
                  <td class="td_button">
                      <a href="#"><i class="bi bi-eye-fill"></i></i></a>
                      <a href="#"><i class="bi bi-file-earmark-text-fill"></i></a>
                      <a href="#"><i class="bi bi-pen-fill"></i></a>
                      <a href="#"><i class="bi bi-trash-fill"></i></a>
                  </td>
              </tr>
          <?php endforeach;?>
        </table>
    </div>
</div>
