<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Transtec</title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body>
<header>
    <div id ="navbar">
    </div>
    <div id ="subnavbar">
        <a id="logo" href="/">
          <?= Html::img('img/logo.png');?>
        </a>
        <div id="login_form">
            <form action="#">
                <label for="user_id">ID do Usuario</label>
                <input id="user_id" type="text">
                <label for="user_password">Senha</label>
                <input id="user_password" type="password">
                <button id="login_button" type="submit">Login </button>
            </form>
        </div>
    </div>



</header>
<div class="main-content">
  <?= $content ?>
</div>
<footer>
    <div id="footer">
        <p>&copy; My Company Y') </p>
    </div>
</footer>
</body>

<?php $this->endBody() ?>


<?php $this->endPage() ?>
