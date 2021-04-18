<?php

use yii\helpers\Html; ?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'contact_us']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header');?>
    <table id="t01">
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Email</th>
        <th>Número</th>
        <th></th>
      </tr>
      <?php foreach ($contact_us as $contact_us_data): ?>
        <tr>
          <td><?= $contact_us_data->name ?></td>
            <td> <?= yii\helpers\BaseStringHelper::truncate($contact_us_data->description, 40) ?></td>
          <td><?= $contact_us_data->email ?></td>
          <td><?= $contact_us_data->number ?></td>
          <td class="td_button">
            <a href="/index.php?r=contact_us/show&contact_us_id=<?= $contact_us_data->id ?>"><i class="bi bi-eye-fill"></i></a>
              <a href="/index.php?r=contact_us/delete&contact_us_id=<?= $contact_us_data->id ?>" data-confirm="Are you sure?">
                  <i class="bi bi-trash-fill"></i>
              </a>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </div>

</div>
