<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\category\models\Category;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\modules\category\models\Category */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'parent_id', ['options' => ['class' => 'form-group col-md-12']])->dropDownList((array)[0=>'Основная категория']+$model->BuildFolder($model->FullTree(),$model->id)) ?>

<?= $form->field($model, 'name',['options' => ['class' => 'form-group col-md-9']])->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'folder',[
    'template' => '{label}<div class="icon-before-input"><div class="fas fa-folder-open fa-lg"></div>{input}</div>{error}{hint}',
    'options' => ['class' => 'form-group col-md-3']
])->dropDownList([0=>'Нет',1=>'Да']) ?>

<?= $form->field($model, 'keywords',['options' => ['class' => 'form-group col-md-12']])->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description',['options' => ['class' => 'form-group col-md-12']])->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>


<div class="form-group col-md-2">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>


