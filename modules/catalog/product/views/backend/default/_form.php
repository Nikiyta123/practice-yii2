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

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name',['options' => ['class' => 'form-group col-md-12']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price',['options' => ['class' => 'form-group col-md-12']])->textInput() ?>

    <?= $form->field($model, 'category_id',['options' => ['class' => 'form-group col-md-12']])->dropDownList($category->BuildFullTree($category->FullTree()), ['options' => $category->ExeptionBulding('folder',1)]) ?>

    <div class="form-group col-md-12">
        <?= \app\modules\images\widgets\BlockImages::widget(['model' => $model,'attribute' => 'images']); ?>
    </div>

    <div class="form-group col-md-12">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
