<?php

use yii\helpers\Html; ?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'projects']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=projects/new']);?>

     <?php if(count($projects) > 0): ?>
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
                         <a href="/index.php?r=projects/show&projects_id=<?= $projects_data->id ?>"><i class="bi bi-eye-fill"></i></a>
                         <a href="/index.php?r=projects/update&projects_id=<?= $projects_data->id ?>"><i class="bi bi-pen-fill"></i></a>
                         <a href="/index.php?r=projects/delete&projects_id=<?= $projects_data->id ?>" data-confirm="Tens a certeza que pretendes eliminar este registro?"><i class="bi bi-trash-fill"></i></a>
                     </td>
                 </tr>
             <?php endforeach;?>
         </table>
      <?php else: ?>
      <div class="empety_repository"> <i class="bi bi-info-circle-fill"></i> Atualmente não existem ficheiros nesse local.</div>
      <?php endif; ?>
  </div>

</div>

<?php if ($error != '') : ?>
    <script>
        toastr.error("<?= $error ?>");
    </script>
<?php endif;?>