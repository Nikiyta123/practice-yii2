<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\assets\CommonAssets;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
CommonAssets::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'Практика',//Yii::$app->name
        'brandUrl' => '/', //Yii::$app->homeUrl
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark',
        ],
    ]);

    if (!Yii::$app->user->isGuest) {
        echo '
            <div class="div-common-forms">
                <a href="/admin" class="btn btn-danger common-forms-btn">Админка</a>
            </div>
            <div class="div-common-forms">
                <a href="/logout" class="btn btn-primary common-forms-btn">Выйти</a>
            </div>
            ';
    }else {
        echo app\modules\user\widgets\BlockForms::widget(['filename' => 'SignInForm']);
        echo app\modules\user\widgets\BlockForms::widget(['filename' => 'SignUpForm']);
    }

    NavBar::end();
    ?>

</header>


<?= $content ?>


<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
