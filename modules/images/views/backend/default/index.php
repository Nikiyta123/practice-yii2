<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

?>

<?php $form = ActiveForm::begin([
    'id' => 'wg-images-form-delete',
    'action' => Url::to(['delete']),
    'enableAjaxValidation' => true,
    //'validateOnSubmit' => true,
    //'validateOnChange' => false,
    //'validateOnBlur' => false,

]); ?>
    <div class="mb-up common-div-wg-images">
        <?= Html::tag('a', '<i class="fas fa-check"> Выбрать</i>',['class' => 'btn btn-success', 'href' => "#"]); ?>
        <?= Html::tag('a', '<i class="fas fa-upload"> Загрузить</i>',['class' => 'btn btn-primary', 'href' => Url::to(['create'])]); ?>
        <?= Html::tag('a', '<i class="fas fa-trash"> Удалить</i>',['class' => 'btn btn-danger', 'href' => Url::to(['delete'])]); ?>
    </div>

    <div class="mb-center common-div-wg-images">
    <?php foreach ($images as $item): ?>

            <img src="<?= $item['path'] ?>" alt="">

    <?php endforeach; ?>

    </div>

<?php ActiveForm::end(); ?>