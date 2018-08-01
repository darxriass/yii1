<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\models\user;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">
    <h1><?= Html::encode('Просмотр') ?></h1>

    <p>
        <?php
        if (!yii::$app->user->isGuest) {
            if (User::findIdentity(Yii::$app->user->id)->status_adm === 1) { ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]); ?>
                <?= Html::a('Редактирование', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); ?>
            <?php }
        } ?>


    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            //  'authors.username',
            'datetime',
            ['attribute' => 'author',
                'value' => function ($model) {
                    if ($model->authors) {
                        return $model->authors->username;
                    } else {
                        return 'Guest';
                    }
                }],
        ],
    ]) ?>

    <h1><?= Html::encode('Комментарии') ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'layout' => "{sorter}\n{pager}\n{summary}\n{items}",
        //'filterModel' => $searchModel,
        'tableOptions' => [
        'class' => 'table table-striped table-bordered',
        'style'=>'white-space: pre-wrap;'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            ],
            'title',
            //['attribute' => 'description',
            //    'contentOptions' => [
            //        'style' => ' font-weight:bold; width:50%;'
            //    ],
            //],
            'description:ntext',
            ['attribute' => 'author',
                'value' => function ($model) {
                    if ($model->authors) {
                        return $model->authors->username;
                    } else {
                        return 'Guest';
                    }
                }
            ],
            'datetime',
            //],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {link}',
            ],
        ],
    ]); ?>

    <?= Html::a('Createcomment', ['createcomment', 'idc' => $model->id], ['class' => 'btn btn-primary']) ?>


</div>
