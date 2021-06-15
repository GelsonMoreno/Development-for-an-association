<?php
$title = "width: 728px;height: 43px;background: #8D8D8D;border-radius: 3px;margin-left: 9px;margin-top: 15px;font-weight: bold;color: #000000;line-height: 40px;text-indent: 1.5em;";

$subtitle = 'width: 300px;height: 40px;background: #C4C4C4;border-radius: 3px;border: 0.5px solid #C4C4C4;line-height: 40px;';

$title2 = "width: 623px;height: 40px;background: #C4C4C4;border-radius: 3px;border: 0.5px solid #C4C4C4;line-height: 40px;";

$discription = "    width: 715px;height: 180px;background: #C4C4C4;border-radius: 3px;border: 0.5px solid #C4C4C4;";
?>

    <div class="col-lg">
        <div style="background-color: ghostwhite;">

        <div style="<?=$title ?>">Detalhe do recebimento</div>
        <div class="form-group">
            <label>Título</label><br>
            <div style="<?=$title2 ?>"><?= $model->title ?></div>
            <label>Endereço</label><br>
            <div style="<?=$title2 ?>"><?= $model->address ?></div>
            <label>Valor(€)</label><br>
            <div style="<?=$subtitle ?>"><?= $model->value ?></div>
            <label>Projeto</label><br>
            <div style="<?=$subtitle ?>"><?= $model->getProject()->title ?></div>
            <label>Empresa</label><br>
            <div style="<?=$subtitle ?>"><?= $model->getCompanies()->name ?></div>
            <label>Tipo</label><br>
            <div style="<?=$subtitle ?>"><?= $model->type ?></div>
            <label>Data de criação</label><br>
            <div style="<?=$subtitle ?>"><?= $model->create_at ?></div>
            <label>Data de modificação</label><br>
            <div style="<?=$subtitle ?>"><?= $model->update_at ?></div>
            <label>Descrição</label><br>
            <div style="<?=$discription ?>"><?= $model->description ?></div>
            <label>File</label><br>
            <div class="file_button">
                <div style="<?=$subtitle ?>">
                    <a href="<?= $model->receiptUrlForDownload() ?>"><i class="bi bi-file-earmark-text-fill"></i>Documento</a>
                </div>
            </div>

        </div>


    </div>

</div>