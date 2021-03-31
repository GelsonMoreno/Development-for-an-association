<?php
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'payments']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header');?>
      <table id="t01">
          <tr>
              <th>Data</th>
              <th>Descrição</th>
              <th>Modo Pagamento</th>
              <th>Valor(€)</th>
              <th>Local</th>
              <th></th>
          </tr>
        <?php foreach ($payments as $payments_data): ?>
            <tr>
                <td><?= $payments_data->date ?></td>
                <td> <?= yii\helpers\BaseStringHelper::truncate($payments_data->description, 40) ?></td>
                <td><?= $payments_data->payment_type ?></td>
                <td><?= $payments_data->value ?></td>
                <td><?= $payments_data->address ?></td>
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