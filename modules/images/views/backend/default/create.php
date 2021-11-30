<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\images\models\Images */


?>

<div class="content-wg-images" id="content-wg-images">
    <div class="mb-up">
        <a href="#" class="btn btn-primary"><i class="fas fa-images"></i> Картинки</i></a>
    </div>

    <div class="mb-create">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>

