<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\images\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'images[]')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>



