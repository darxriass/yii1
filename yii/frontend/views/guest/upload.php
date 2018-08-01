<?php
use yii\widgets\ActiveForm;

/**
 * Created by PhpStorm.
 * User: 1
 * Date: 30.07.2018
 * Time: 21:08
 */
?>

<?php if ($model->image){ ?>
    <img src="../../htdocs/upload/image/<?= $model->image ?>" alt="" width="100" height="100">
<?php }; ?>


<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'image')->fileInput() ?>

<button>Загрузить</button>

<?php ActiveForm::end() ?>
