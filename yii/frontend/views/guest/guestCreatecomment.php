<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Создание новой 111 записи:';
$this->params['breadcrumbs'][] = ['label' => 'Guest', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if (Yii::$app->user->isGuest) {
        echo $this->render('_formcomment', [

            'model' => $model,
        ]);
    } else {
        echo $this->render('_formautcomment', [

            'model' => $model,
        ]);
    }

    ?>

</div>

