<?php
?>
<div class="left_column">
    <ul class="left_column_ul">

        <?php if(Yii::$app->user->identity->isAdmin()): ?>
            <li><a href="/index.php?r=documents/index"><button class="left_column_button <?= $active == 'documents' ? 'active': '' ?>">Documentos</button></a></li>
            <li><a href="/index.php?r=receipts/index"><button class="left_column_button <?= $active == 'receipts' ? 'active': '' ?>">Recebimentos</button></a></li>
            <li><a href="/index.php?r=payments/index"><button class="left_column_button <?= $active == 'payments' ? 'active': '' ?>">Pagamentos</button></a></li>
            <li><a href="/index.php?r=users/index"><button class="left_column_button <?= $active == 'users' ? 'active': '' ?>">Utilizadores</button></a></li>
            <li><a href="/index.php?r=news/index"><button class="left_column_button <?= $active == 'news' ? 'active': '' ?>">Conteudos</button></a></li>
            <li><a href="/index.php?r=contact_us/index"><button class="left_column_button <?= $active == 'contact_us' ? 'active': '' ?>">Contate-Nos</button></a></li>

        <?php elseif (Yii::$app->user->identity->isAssociated()):?>
            <li><a href="/index.php?r=users/profile"><button class="left_column_button <?= $active == 'profile' ? 'active': '' ?>">Perfil</button></a></li>
            <li><a href="/index.php?r=users/settings"><button class="left_column_button <?= $active == 'settings' ? 'active': '' ?>">Definições</button></a></li>
            <li><a href="/index.php?r=documents/index"><button class="left_column_button <?= $active == 'documents' ? 'active': '' ?>">Documentos</button></a></li>

        <?php elseif (Yii::$app->user->identity->isBoard()):?>
            <li><a href="/index.php?r=documents/index"><button class="left_column_button <?= $active == 'documents' ? 'active': '' ?>">Documentos</button></a></li>
            <li><a href="/index.php?r=receipts/index"><button class="left_column_button <?= $active == 'receipts' ? 'active': '' ?>">Recebimentos</button></a></li>
            <li><a href="/index.php?r=payments/index"><button class="left_column_button <?= $active == 'payments' ? 'active': '' ?>">Pagamentos</button></a></li>

        <?php elseif (Yii::$app->user->identity->isEmployee()):?>
            <li><a href="/index.php?r=documents/index"><button class="left_column_button <?= $active == 'documents' ? 'active': '' ?>">Documentos</button></a></li>
            <li><a href="/index.php?r=receipts/index"><button class="left_column_button <?= $active == 'receipts' ? 'active': '' ?>">Recebimentos</button></a></li>
            <li><a href="/index.php?r=payments/index"><button class="left_column_button <?= $active == 'payments' ? 'active': '' ?>">Pagamentos</button></a></li>
            <li><a href="/index.php?r=projects/index"><button class="left_column_button <?= $active == 'projects' ? 'active': '' ?>">Projetos</button></a></li>
            <li><a href="/index.php?r=users/index"><button class="left_column_button <?= $active == 'users' ? 'active': '' ?>">Associados</button></a></li>
            <li><a href="/index.php?r=news/index"><button class="left_column_button <?= $active == 'news' ? 'active': '' ?>">Conteudos</button></a></li>
            <li><a href="/index.php?r=contact_us/index"><button class="left_column_button <?= $active == 'contact_us' ? 'active': '' ?>">Contate-Nos</button></a></li>
        <?php endif; ?>
    </ul>
</div>



