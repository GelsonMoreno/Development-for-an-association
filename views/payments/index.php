<?php
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'payments']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=payments/new', 'exportButton' => true, 'export_url'=> '/index.php?r=payments/export']);?>
    <?= $this->render('../shared/content_balance', ['total_money' => $total_money]);?>

    <?php if(count($payments) > 0): ?>
        <table id="t01">
            <tr>
                <th>Data de criação</th>
                <th>Descrição</th>
                <th>Modo Pagamento</th>
                <th>Valor(€)</th>
                <th>Local</th>
                <th></th>
            </tr>
          <?php foreach ($payments as $payments_data): ?>
              <tr>
                  <td><?= $payments_data->create_at ?></td>
                  <td> <?= yii\helpers\BaseStringHelper::truncate($payments_data->description, 40) ?></td>
                  <td><?= $payments_data->payment_type ?></td>
                  <td><?= $payments_data->value ?></td>
                  <td><?= $payments_data->address ?></td>
                  <td class="td_button">
                      <a href="/index.php?r=payments/show&payment_id=<?= $payments_data->id ?>"><i class="bi bi-eye-fill"></i></i></a>
                      <a href="<?= $payments_data->paymentUrlForDownload() . '&inline=true' ?>" target="_blank"><i class="bi bi-file-earmark-text-fill"></i></a>

                      <a href="/index.php?r=payments/update&payment_id=<?= $payments_data->id ?>"><i class="bi bi-pen-fill"></i></a>
                      <a href="/index.php?r=payments/delete&payment_id=<?= $payments_data->id ?>" data-confirm="Tens a certeza que pretendes eliminar este registro?"><i class="bi bi-trash-fill"></i></a>
                  </td>
              </tr>
          <?php endforeach;?>
        </table>
    <?php else: ?>
        <div class="empety_repository"> <i class="bi bi-info-circle-fill"></i> Atualmente não existem ficheiros nesse local.</div>
    <?php endif; ?>


  </div>
</div>