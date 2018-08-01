<?php

/* @var $this yii\web\View */

$this->title = 'Гостевая книга';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Гостевая книга</h1>
        <h3><?= \yii\bootstrap\Html::a('Полная версия', ['guest/index']) ?></h3><br>
        <h3>Последние записи:</h3>
        <div class="body-content">

            <div class="row">
                <?php $twelveRecords = array_slice($newss, 0, 12);?>
                <?php foreach ($twelveRecords as $value): ?>
                    <div class="col-lg-4" align="bootom"  style="height:180px; border:1px solid #93B4D9;" >
                        <h2><?= $value->title ?></h2>
                        <?= substr($value->description, 0, 200) ?>
                        <?= \yii\bootstrap\Html::a('... Подробнее', ['guest/one', 'id' => $value->id]) ?>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
