<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Posts;

$user=[];
if (  ! Yii::$app->user->isGuest): {
        if ( Yii::$app->user->identity->category == 'admin' ):
		$user = 'admin';
	elseif ( Yii::$app->user->identity->category == 'supervisor' ):
		$user = 'supervisor';
	elseif ( Yii::$app->user->identity->category == 'employee' ):
                $user = 'employee';	
endif;
}
endif;


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
            ['label' => 'Home', 'url' => ['/site/index'],'visible' => $user != 'supervisor'],
	    ['label' => 'Artist', 'url' => ['/site/artist'],'visible' => $user != 'supervisor'],
	    ['label' => 'MP3s', 'url' => ['/site/mpe'],'visible' => $user != 'supervisor'],
	    ['label' => 'Enquiries', 'url' => ['/site/contact'],'visible' => $user != 'supervisor'],
	    ['label' => 'Add User', 'url' => ['/site/createuser'], 'visible' => $user == 'admin'],
	    ['label' => 'Dashboard', 'url' => ['/site/dashboard'], 'visible' => $user == 'supervisor'],
	    ['label' => 'Employees', 'url' => ['/site/emplist'], 'visible' => $user == 'supervisor'],
	    ['label' => 'Inventory', 'url' => ['/site/inventory'], 'visible' => $user == 'supervisor'],
	    ['label' => 'Report', 'url' => ['/site/report'], 'visible' => $user == 'supervisor'],
	    ['label' => 'Buy List', 'url' => ['/site/buylist'], 'visible' => $user == 'supervisor'],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
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
        <p class="pull-left">&copy; My Music Store <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
