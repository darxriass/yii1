<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\user;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Записи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    if (!yii::$app->user->isGuest) {
        if (User::findIdentity(Yii::$app->user->id)->status_adm === 1) { ?>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'layout' => "{sorter}\n{pager}\n{summary}\n{items}",
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        // 'headerOptions' => ['width' => '10%'],
                        //  'options'=>['style'=>'word-wrap:break-word;width:300px;'],
                        //'options' => [
                        //'style' => 'word-wrap: break-word;',
                        //'attribute' => 'description',
                        //'format' => 'html',
                        // 'contentOptions' => function ($model) {
                        //    return 'max-width:150px; overflow: auto; white-space: normal; word-wrap: break-word;'}
                        // ],

                    ],

                    'id',
                    'title',
                    'description:ntext',
                    //['attribute' => 'description',
                    //   'contentOptions' => [
                    //        'style'=>' format:raw; word-wrap: break-word;'
                    //    ],
                    //],
                    ['attribute' => 'author',
                        'value' => function ($model) {
                            if ($model->authors) {
                                return $model->authors->username;
                            } else {
                                return 'Guest';
                            }
                        }
                    ],
                    [
                        'label' => 'Аватар',
                        "attribute"=> "image",
                        'format' => 'raw',
                        'value' => function($data){
                            return ($data->authors) ? Html::img($data->authors->link_image , ['alt'=>'yii','width'=>'50','height'=>'50'])
                                :
                                Html::img(Yii::$app->params['default_image'], ['alt'=>'yii','width'=>'50','height'=>'50']);
                        },
                    ],
                    //],

                    ['class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'headerOptions' => ['width' => '80'],
                        'template' => '{view} {update} {delete}{link}',
                    ],
                ],
            ]); ?>

        <?php } else {?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'layout' => "{sorter}\n{pager}\n{summary}\n{items}",
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn',
                    // 'headerOptions' => ['width' => '10%'],
                    //  'options'=>['style'=>'word-wrap:break-word;width:300px;'],
                    //'options' => [
                    //'style' => 'word-wrap: break-word;',
                    //'attribute' => 'description',
                    //'format' => 'html',
                    // 'contentOptions' => function ($model) {
                    //    return 'max-width:150px; overflow: auto; white-space: normal; word-wrap: break-word;'}
                    // ],

                ],

                'id',
                'title',
                'description:ntext',
                //['attribute' => 'description',
                //   'contentOptions' => [
                //        'style'=>' format:raw; word-wrap: break-word;'
                //    ],
                //],
                ['attribute' => 'author',
                    'value' => function ($model) {
                        if ($model->authors) {
                            return $model->authors->username;
                        } else {
                            return 'Guest';
                        }
                    }
                ],
                [
                    'label' => 'Аватар',
                    "attribute"=> "image",
                    'format' => 'raw',
                    'value' => function($data){
                        return ($data->authors) ? Html::img($data->authors->link_image , ['alt'=>'yii','width'=>'50','height'=>'50'])
                            :
                            Html::img(Yii::$app->params['default_image'], ['alt'=>'yii','width'=>'50','height'=>'50']);
                    },
                ],
                //],

                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '80'],
                    'template' => '{view} {link}',
                ],
            ],
        ]); ?>

    <?php } } else { ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'layout' => "{sorter}\n{pager}\n{summary}\n{items}",
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                // 'headerOptions' => ['width' => '10%'],
                //  'options'=>['style'=>'word-wrap:break-word;width:300px;'],
                //'options' => [
                //'style' => 'word-wrap: break-word;',
                //'attribute' => 'description',
                //'format' => 'html',
                // 'contentOptions' => function ($model) {
                //    return 'max-width:150px; overflow: auto; white-space: normal; word-wrap: break-word;'}
                // ],

            ],

            'id',
            'title',
            'description:ntext',
            //['attribute' => 'description',
            //   'contentOptions' => [
            //        'style'=>' format:raw; word-wrap: break-word;'
            //    ],
            //],
            ['attribute' => 'author',
                'value' => function ($model) {
                    if ($model->authors) {
                        return $model->authors->username;
                    } else {
                        return 'Guest';
                    }
                }
            ],
            [
                'label' => 'Аватар',
                "attribute"=> "image",
                'format' => 'raw',
                'value' => function($data){
                    return ($data->authors) ? Html::img($data->authors->link_image , ['alt'=>'yii','width'=>'50','height'=>'50'])
                        :
                        Html::img(Yii::$app->params['default_image'], ['alt'=>'yii','width'=>'50','height'=>'50']);
                },
            ],


            //],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {link}',
            ],
        ],
    ]); ?>

    <?php } ?>
</div>
