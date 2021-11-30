<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\images\models\Images */
/* @var $form yii\widgets\ActiveForm */

?>


<?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'wg-images-form',
        'action' => Url::to(['create']),
        //'validationUrl' => Url::to(['validation-forms']),
        //'enableAjaxValidation' => true,
        'validateOnSubmit' => true,
        'validateOnChange' => false,
        'validateOnBlur' => false,

]); ?>

<?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'format')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'images[]')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-default wg-images-button']) ?>
</div>

<?php ActiveForm::end(); ?>



