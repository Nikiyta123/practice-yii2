<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\catalog\category\models\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\product\models\Product */
/* @var $form yii\widgets\ActiveForm */

$category = new Category;


?>

<div class="product-form col-md-12">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList($category->BuildFullTree($category->FullTree()), ['options' => $category->ExeptionBulding('folder',1)]) ?>

    <?= $form->field($model, 'images[]')->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
