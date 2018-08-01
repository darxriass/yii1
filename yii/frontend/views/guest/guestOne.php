<?php

use yii\helpers\Html;
use common\models\User;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $newsso common\models\News */
/* @var $userr common\models\User */

$this->title = 'Гостевая книга';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Добро пожаловать, Гость</h2><br>

        <div class="body-content">

            <?= Html::a('Оставить комментарий', ['createcomment', 'idc' => $newsso->id], ['class' => 'btn btn-primary']) ?>
            <br><br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Создано</th>
                    <th>Запись</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="20%"><h4><?php if ($newsso->authors) {
                                echo $newsso->authors->username;
                            } else {
                                echo("Гость: " . $newsso->nickname);
                            }
                            ?></h4><BR><?= $newsso->datetime ?>
                        <?php if ($newsso->authors){ ?>
                        <img src="<?= $newsso->authors->link_image ?>" alt="" width="100" height="100"></td>
                    <?php } else { ?>
                        <img src="<?= Yii::$app->params['default_image']?>" alt="" width="100" height="100">
                    <?php }?>
                    <td width="80%" align="left"><h3><?= $newsso->title ?></h3> <BR> <?= $newsso->description ?></td>
                </tr>
                </tbody>
            </table>

            <h2>Комментарии</h2>

            <div class="body-content">

                <div class="row">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th><h2 align="center">Создано</h2></th>
                            <th><h2 align="center">Запись</h2></th>
                        </tr>
                        </thead>

                        <?php foreach ($dataProvider->getModels() as $value): ?>
                            <tbody>
                            <tr>
                                <td width="20%"><b><h4> Создано:
                                            <?php if ($value->authors) {
                                                echo $value->authors->username;
                                            } else {
                                                echo("Гость: " . $value->nickname);
                                            }
                                            ?> <?= $value->datetime ?></h4></b>
                                    <?php if ($value->authors){ ?>
                                        <img src="<?= $value->authors->link_image ?>" alt="" width="100" height="100">
                                    <?php } else { ?>
                                        <img src="<?= Yii::$app->params['default_image']?>" alt="" width="100" height="100">
                                    <?php }?>
                                </td>
                                <?php if ($value->authors) {
                                    if ($value->authors->status_adm === 1) { ?>
                                        <td width="80%" align="left">
                                            <h3>
                                                <?= $value->title ?><BR>
                                            </h3>
                                            <h3>
                                                <?= $value->description; ?>
                                                <?= \yii\bootstrap\Html::a('... Подробнее', ['guest/one', 'id' => $value->id]) ?>
                                            </h3>
                                            <BR>
                                            <span style="color: #0fff01; "><b><i>Внимание данное сообщение оставлено администратором</i></b></span>

                                        </td>
                                        <?php
                                    } else { ?>



                                        <td width="80%" align="left">
                                            <h3>
                                                <?= $value->title ?><BR>
                                            </h3>
                                            <h3>
                                                <?= $value->description; ?>
                                                <?= \yii\bootstrap\Html::a('... Подробнее', ['guest/one', 'id' => $value->id]) ?></h3>
                                            <BR>
                                        </td>


                                 <?php   }
                                } else { ?>



                                    <td width="80%" align="left">
                                        <h3>
                                            <?= $value->title ?><BR>
                                        </h3>
                                        <h3>
                                            <?= $value->description; ?>
                                            <?= \yii\bootstrap\Html::a('... Подробнее', ['guest/one', 'id' => $value->id]) ?></h3>
                                        <BR>
                                    </td>


                                <?php } ?>


                            </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?= LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                ]); ?>
            </div>

            <h3><?= \yii\bootstrap\Html::a('Вернуться к гостевой книге', ['guest/index']) ?></h3><br>
        </div>
    </div>
</div>