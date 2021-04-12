<?php

use yii\helpers\Html; ?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'projects']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header');?>
    <table id="t01">
      <tr>
        <th>Título</th>
        <th>Estado</th>
        <th>Valor(€)</th>
        <th>Data Inicial</th>
        <th>Data Final</th>
        <th>Local</th>
        <th></th>
      </tr>
      <?php foreach ($projects as $projects_data): ?>
        <tr>
          <td><?= $projects_data->title ?></td>
          <td><?= $projects_data->state ?></td>
          <td><?= $projects_data->value ?></td>
          <td><?= $projects_data->begin_date ?></td>
          <td><?= $projects_data->end_date ?></td>
          <td><?= $projects_data->address ?></td>
          <td class="td_button">
            <a<i class="bi bi-eye-fill"></i></a>
            <a<i class="bi bi-file-earmark-text-fill"></i></a>
            <a><i class="bi bi-pen-fill"></i></a>
            <a><i class="bi bi-trash-fill"></i>
            </a>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </div>

</div>
