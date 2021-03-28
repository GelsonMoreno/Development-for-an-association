<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

$login_form = $this->params['login_form'];
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
    <div id ="navbar"></div>
    <div id ="subnavbar">
       <a id="logo" href="/">
          <?= Html::img('img/logo.png') ;?>
       </a>
      <?php if(Yii::$app->user->getIsGuest()): ?>
        <?= $this->render('login_form', ['model' => $login_form]);?>
      <?php else: ?>
          <a href="/index.php?r=login/logout">Logout</a>
      <?php endif ?>
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
