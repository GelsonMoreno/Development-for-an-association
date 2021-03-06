<?php

use yii\helpers\Html; ?>
<div class='row'>
    <div class="col-sm">
        <?= $this->render('../shared/left_column', ['active' => 'companies']);?>
    </div>
    <div class="col-lg">
        <?= $this->render('../shared/content_header', ['new_url'=>'index.php?r=companies/new', 'newButtonLabel'=> 'Criar']);?>

        <?php if(count($companies) > 0): ?>
        <table id="t01">
            <tr>
                <th>Nome</th>
                <th>Saldo(€)</th>
                <th></th>
            </tr>
            <?php foreach ($companies as $companies_data): ?>
                <tr>
                    <td><?= $companies_data->name ?></td>
                    <td><?= $companies_data->balance ?></td>

                    <td class="td_button">
                        <a href="/index.php?r=companies/update&companies_id=<?= $companies_data->id ?>"><i class="bi bi-pen-fill"></i></a>
                        <a href="/index.php?r=companies/delete&companies_id=<?= $companies_data->id ?>" data-confirm="Tens a certeza que pretendes eliminar este registro?"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php else: ?>
        <div class="empety_repository"> <i class="bi bi-info-circle-fill"></i> Atualmente não existem empresas adicionadas.</div>
    <?php endif; ?>
    </div>
</div>
<?php if ($error != '') : ?>
    <script>
        toastr.error("<?= $error ?>");
    </script>
<?php endif;?>