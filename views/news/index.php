<?php
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'news']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=news/new']);?>

    <?php if(count($news) > 0): ?>
        <table id="t01">
            <tr>
                <th>Título</th>
                <th>Notícias</th>
                <th>Data de criação</th>
                <th></th>
            </tr>
          <?php foreach ($news as $news_data): ?>
              <tr>
                  <td><?= $news_data->title ?></td>
                  <td> <?= yii\helpers\BaseStringHelper::truncate($news_data->text, 60) ?></td>
                  <td><?= $news_data->create_at ?></td>
                  <td class="td_button">
                      <a href="/index.php?r=news/show&news_id=<?= $news_data->id ?>"><i class="bi bi-eye-fill"></i></a>
                      <a href="/index.php?r=news/update&news_id=<?= $news_data->id ?>">
                          <i class="bi bi-pen-fill"></i>
                      </a>
                      <a href="/index.php?r=news/delete&news_id=<?= $news_data->id ?>" data-confirm="Tens a certeza que pretendes eliminar este registro?">
                          <i class="bi bi-trash-fill"></i>
                      </a>
                  </td>
              </tr>
          <?php endforeach;?>
        </table>

    <?php else: ?>
        <div class="empety_repository"> <i class="bi bi-info-circle-fill"></i> Atualmente não existem ficheiros nesse local.</div>
    <?php endif; ?>


  </div>
</div>
