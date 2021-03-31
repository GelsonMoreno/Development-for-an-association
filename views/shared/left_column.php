<?php
?>
<div class="left_column">
    <ul class="left_column_ul">
        <li><a href="/index.php?r=documents/index"><button class="left_column_button <?= $active == 'documents' ? 'active': '' ?>">Documentos</button></a></li>
        <li><a href="/index.php?r=receipts/index"><button class="left_column_button <?= $active == 'receipts' ? 'active': '' ?>">Recebimentos</button></a></li>
        <?php if(!Yii::$app->user->identity->isAdmin()): ?>
            <li><a href="#"><button class="left_column_button" >Projectos</button></a></li>
            <li><a href="#"><button class="left_column_button">Asssociados</button></a></li>
        <?php endif; ?>
        <li><a href="/index.php?r=payments/index"><button class="left_column_button <?= $active == 'payments' ? 'active': '' ?>">Pagamentos</button></a></li>
        <li><a href="/index.php?r=users/index"><button class="left_column_button <?= $active == 'users' ? 'active': '' ?>">Utilizadores</button></a></li>
        <li><a href="/index.php?r=news/index"><button class="left_column_button <?= $active == 'news' ? 'active': '' ?>">Conteudos</button></a></li>
    </ul>
</div>



