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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.png" type="image/png" />
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            
            Yii::$app->user->can('admin') ? (
                ['label' => 'Dashboard', 'url' => ['/user/dash-admin']]
            ) : (
                Yii::$app->user->can('event-manager') ? (
                    ['label' => 'Dashboard', 'url' => ['/user/dash-event-manager']]
                ) : (
                    Yii::$app->user->can('volunteer') ? (
                        ['label' => 'Dashboard', 'url' => ['/user/dash-volunteer']]
                    ) :(
                        Yii::$app->user->can('participant') ? (
                            ['label' => 'Dashboard', 'url' => ['/user/dash-participant']]
                        ) : (['label' => 'Signup', 'url' => ['/user/create']])
                    )
                )
            ),

            Yii::$app->user->isGuest ? (
                ['label' => 'Signin', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->name . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
                ),            
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
        <p class="pull-left">&copy; Team One EVS <?= date('Y')?><?= Html::a('Contact us for any queries', ['/site/contact'], ['class' => 'btn btn-link']);?></p>
        <div class="pull-right"><img class="logo-amrita" src="<?php echo Yii::$app->request->baseUrl; ?>/images/amrita.png" type="image/png" /></div>
        <div class="pull-right"><img class="logo-bharath" src="<?php echo Yii::$app->request->baseUrl; ?>/images/swachh-bharath.png" type="image/png" /></div>
    </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
