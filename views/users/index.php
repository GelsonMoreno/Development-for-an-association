<?php
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'users']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header');?>
      <table id="t01">
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>NIF</th>
              <th>Telefone</th>
              <th></th>
          </tr>
        <?php foreach ($users as $users_data): ?>
            <tr>
                <td><?= $users_data->id ?></td>
                <td><?= $users_data->name ?></td>
                <td><?= $users_data->email ?></td>
                <td><?= $users_data->nif ?></td>
                <td><?= $users_data->number ?></td>
                <td class="td_button">
                    <a href="#"><i class="bi bi-person-fill"></i></i></a>
                    <a href="#"><i class="bi bi-pen-fill"></i></a>
                    <a href="#"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
        <?php endforeach;?>
      </table>
  </div>
</div>
