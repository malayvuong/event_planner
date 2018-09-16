<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'VNM Design',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Các sự kiện', 'url' => ['/show/index']],
            ['label' => 'Đã hoàn tất', 'url' => ['/show/complete']],
            ['label' => 'Sắp diễn ra', 'url' => ['/show/incoming']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Đăng nhập', 'url' => ['/site/login']]
            ) : (
                (Yii::$app->user->id == 100 ?
                '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quản lý <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="'.Url::base(true).'/users">Users</a></li>
                        <li><a href="'.Url::base(true).'/congviec">Công việc</a></li>
                        <li><a href="'.Url::base(true).'/sukien">Sự kiện</a></li>
                    </ul>
                </li>' : '' ) .'
                <li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Thoát (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; VNM Design <?= date('Y') ?></p>

        <p class="pull-right">Công cụ được Tài trợ và Hỗ trợ hoàn toàn <span style="color:#000"><strong>MIỄN PHÍ</strong></span> bởi <a href="https://thuvienhuongdan.com">VNM Design</a></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>