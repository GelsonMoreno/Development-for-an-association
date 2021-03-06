<?php
?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'receipts']);?>
    </div>
    <div class="col-lg">
      <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=receipts/new', 'exportButton' => true, 'export_url'=> '/index.php?r=receipts/export']);?>
      <?= $this->render('../shared/content_balance', ['total_money' => $total_money]);?>

        <?php if(count($receipts) > 0): ?>
            <table id="t01">
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data de criação</th>
                    <th>Valor(€)</th>
                    <th>Local</th>
                    <th></th>
                </tr>
              <?php foreach ($receipts as $receipts_data): ?>
                  <tr>
                      <td><?= $receipts_data->title ?></td>
                      <td> <?= yii\helpers\BaseStringHelper::truncate($receipts_data->description, 40) ?></td>
                      <td><?= $receipts_data->create_at ?></td>
                      <td><?= $receipts_data->value ?></td>
                      <td><?= $receipts_data->address ?></td>
                      <td class="td_button">
                          <a href="/index.php?r=receipts/show&receipts_id=<?= $receipts_data->id ?>"><i class="bi bi-eye-fill"></i></a>
                          <a href="<?= $receipts_data->receiptUrlForDownload() . '&inline=true' ?>" target="_blank"><i class="bi bi-file-earmark-text-fill"></i></a>
                          <a href="/index.php?r=receipts/update&receipts_id=<?= $receipts_data->id ?>"><i class="bi bi-pen-fill"></i></a>
                          <a href="/index.php?r=receipts/delete&receipts_id=<?= $receipts_data->id ?>" data-confirm="Tens a certeza que pretendes eliminar este registro?"
                          <i class="bi bi-trash-fill"></i></a>
                      </td>
                  </tr>
              <?php endforeach;?>
            </table>
        <?php else: ?>
            <div class="empety_repository"> <i class="bi bi-info-circle-fill"></i> Atualmente não existem ficheiros nesse local.</div>
        <?php endif; ?>
    </div>
</div>
