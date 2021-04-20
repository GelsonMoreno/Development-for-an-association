<?php
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'news']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=news/new']);?>
    <table id="t01">
      <tr>
        <th>Título</th>
        <th>Notícias</th>
        <th>Data</th>
        <th></th>
      </tr>
      <?php foreach ($news as $news_data): ?>
        <tr>
          <td><?= $news_data->title ?></td>
          <td> <?= yii\helpers\BaseStringHelper::truncate($news_data->text, 60) ?></td>
          <td><?= $news_data->date ?></td>
          <td class="td_button">
              <a href="/index.php?r=news/show&news_id=<?= $news_data->id ?>"><i class="bi bi-eye-fill"></i></a>
              <a href="/index.php?r=news/update&news_id=<?= $news_data->id ?>">
                  <i class="bi bi-pen-fill"></i>
              </a>
              <a href="/index.php?r=news/delete&news_id=<?= $news_data->id ?>" data-confirm="Are you sure?">
                  <i class="bi bi-trash-fill"></i>
              </a>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </div>
</div>
