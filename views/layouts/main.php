<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Transtec</title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<?php $this->beginBody() ?>
<body>
<header>
    <div id ="navbar"></div>
    <div id ="subnavbar">
       <a href="/">
          <?= Html::img('img/logo.png', ['class'=>'logo'] ) ;?>
       </a>
      <?php if(Yii::$app->user->getIsGuest()): ?>
        <?= $this->render('login_form', ['model' => $this->params['login_form']]);?>
      <?php else: ?>
          <div class="wrapper">
              <div class="navbar">
                  <div class="right">
                      <ul class="xxx" style=" list-style: none;">
                          <li style="background: none;">
                              <a href="#">
                                  <p><?=  Yii::$app->user->identity->name ?><br> <span><?= Yii::$app->user->identity->getUserType()->designation ?></span></p>
                                  <img src="<?= Yii::$app->user->identity->getUserImg() ?>" class="profile" onerror="this.src='img/Profile1.png';"/>
                              </a>

                              <div class="dropdown">
                                  <ul style=" list-style: none;">
                                      <li><a href="/index.php?r=users/show&users_id=<?= Yii::$app->user->identity->id ?>"><i class="glyphicon glyphicon-user" style="margin-right: 10px;"></i> Perfil</a></li>
                                      <li><a href="/index.php?r=users/settings"><i class="glyphicon glyphicon-cog" style="margin-right: 10px;"></i>Definições</a></li>
                                      <li><a href="/index.php?r=login/logout"><i class="glyphicon glyphicon-log-out" style="margin-right: 10px;"></i> Signout</a></li>
                                  </ul>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>

          <script>
              document.querySelector(".right ul li").addEventListener("click", function(){
                  this.classList.toggle("active");
              });
          </script>
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
