<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\images\models\Images */


?>


    <div class="mb-up common-div-wg-images">
        <?= Html::tag('a', '<i class="fas fa-images"></i> Картинки</i>',['class' => 'btn btn-primary', 'href' => Url::to(['index'])]); ?>
    </div>

    <div class="mb-create common-div-wg-images">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>



