<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
/*  $model->author = (Yii::$app->user->identity->id),*/
?>


<?=var_dump($model);?>
<div class="news-form">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verifyCode')->widget(
        yii\captcha\Captcha::className(),
        [
            'captchaAction' => 'news/captcha',
            'template' => '<div class="row"><div class="col-xs-3">{image}</div><div class="col-xs-4">{input}</div></div>'

        ]
    )->hint('Нажмите на картинку, чтобы обновить.') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
