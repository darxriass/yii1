<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (User::findIdentity(Yii::$app->user->id)->status_adm == 1) {?>
    <?= $form->field($model, 'status')->dropDownList([
        '0' => 'Заблокированный',
        '10' => 'Активный',
    ]); ?>

    <?= $form->field($model, 'status_adm')->dropDownList([
        '0' => 'Пользователь',
        '1' => 'Администратор',
    ]); ?>
    <?php }?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?php if ($model->link_image){ ?>
        <img src="<?= $model->link_image ?>" alt="" width="100" height="100">
    <?php }; ?>

    <?= $form->field($model1, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
