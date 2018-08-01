<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\user;

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
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (!yii::$app->user->isGuest) {
        if (User::findIdentity(Yii::$app->user->id)->status_adm === 1) {
            $menuItems = [
                ['label' => 'Домой', 'url' => ['/site/index']],
                ['label' => 'Админка', 'url' => ['/user/index']],
                ['label' => 'Гостевая книга', 'url' => ['/guest/index']],
                ['label' => 'Гостевая книга(альтернативная)', 'url' => ['/news/index']],
                // ['label' => 'Контакты', 'url' => ['/site/
            ];
        } else {
            $menuItems = [
                ['label' => 'Домой', 'url' => ['/site/index']],
                //['label' => 'Админка', 'url' => ['/user/index']],
                ['label' => 'Гостевая книга', 'url' => ['/guest/index']],
                ['label' => 'Гостевая книга(альтернативная)', 'url' => ['/news/index']],
                // ['label' => 'Контакты', 'url' => ['/site/
            ];
        }
    } else {
        $menuItems = [
            ['label' => 'Домой', 'url' => ['/site/index']],
            //['label' => 'Админка', 'url' => ['/user/index']],
            ['label' => 'Гостевая книга', 'url' => ['/guest/index']],
            ['label' => 'Гостевая книга(альтернативная)', 'url' => ['/news/index']],
            // ['label' => 'Контакты', 'url' => ['/site/
        ];
    };

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Личный кабинет', 'url' => ['/user/update', 'id' => yii::$app->user->id]];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
