<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $LinkPager \yii\widgets\LinkPager */

$this->title = 'Гостевая книга';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Гостевая книга</h1>

        <div class="body-content">

            <div class="row">
                <h4><?= \yii\bootstrap\Html::a('Создать новую запись', ['guest/create'], ['class' => 'btn btn-success']) ?></h4>
                <br> <br>

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
                                    ?> <?= $value->datetime ?></h4>
                                    <?php if ($value->authors){ ?>
                                <img src="<?= $value->authors->link_image ?>" alt="" width="100" height="100">
                                    <?php } else { ?>
                                    <img src="<?= Yii::$app->params['default_image']?>" alt="" width="100" height="100">
                                    <?php }?>
                            </td>
                            <td width="80%" align="left">
                                <h2>
                                <?= $value->title ?><BR>
                                </h2>
                                <h3>
                                    <?= substr($value->description, 0, 200) ?>
                                    <?= \yii\bootstrap\Html::a('... Подробнее', ['guest/one', 'id' => $value->id]) ?></h3>
                                <BR></td>
                        </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
            ]); ?>
        </div>
    </div>
</div>


