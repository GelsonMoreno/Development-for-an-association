<?php ?>

<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'message']);?>
    </div>
    <div class="col-lg">
      <?= $this->render('../shared/content_header', ['showNewButton'=> false]);?>

      <?php if(count($message) > 0): ?>
          <table id="t01">
              <tr>
                  <th>Assunto</th>
                  <th>Texto</th>
                  <th>Enviado por</th>
                  <th>Data de criação</th>
                  <th></th>
              </tr>
            <?php foreach ($message as $message_data): ?>
                <tr>
                    <td><?= $message_data->title ?></td>
                    <td> <?= yii\helpers\BaseStringHelper::truncate($message_data->text, 40) ?></td>
                    <td><?= $message_data->getUserName()->name ?></td>
                    <td><?= $message_data->create_at ?></td>
                    <td class="td_button">
                        <a href="/index.php?r=message/show&message_id=<?= $message_data->id ?>"><i class="bi bi-eye-fill"></i></a>
                        <a href="/index.php?r=message/delete&message_id=<?= $message_data->id ?>"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
          </table>
      <?php else: ?>
          <div class="empety_repository"> <i class="bi bi-info-circle-fill"></i> Atualmente não existem ficheiros nesse local.</div>
      <?php endif; ?>

    </div>
</div>
