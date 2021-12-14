<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$js = <<< JS
    $('#wg-delete').on('click', function (e) {
        let form = $('#wg-images-form-index');
        console.log(form.serializeArray());
        $.pjax({
            type       : 'POST',
            url        : $(this).attr('href'),
            container  : '#pjaxContentWgImages',
            data       : form.serializeArray(),
            push       : false,
            timeout    : 5000,
        });
        return false;
    });

    $('#wg-select').on('click', function (e) {
        let form = $('#wg-images-form-index');
        $.pjax({
            type       : 'POST',
            url        : $(this).attr('href'),
            container  : '#pjaxViewWgImages',
            data       : form.serializeArray(),
            push       : false,
            timeout    : 5000,
        });
        return false;
    });
    
JS;

$this->registerJs($js);

?>

<?php $form = ActiveForm::begin([
    'id' => 'wg-images-form-index',
    'action' => Url::to(['delete']),
]); ?>
    <div class="mb-up common-div-wg-images">
        <?= Html::tag('a', '<i class="fas fa-check"> Выбрать</i>',['class' => 'btn btn-success','id'=>'wg-select','href' => Url::to(['select'])]); ?>
        <?= Html::tag('a', '<i class="fas fa-upload"> Загрузить</i>',['class' => 'btn btn-primary', 'href' => Url::to(['create'])]); ?>
        <?= Html::tag('a', '<i class="fas fa-trash"> Удалить</i>',['class' => 'btn btn-danger','id'=>'wg-delete','href' => Url::to(['delete'])]); ?>
    </div>

    <div class="mb-center">

        <?php if($images): ?>

            <div class="all-wg-images common-div-wg-images">

                <?php foreach ($images as $item): ?>

                    <div class="block-for-wg-images">
                        <input class="wg-input" id="<?=$item['id']?>" type="checkbox" name="images[]" value="<?=$item['id']?>">
                        <label for="<?=$item['id']?>" class="wg-label"><img src="<?=$item['path']?>"></label>
                    </div>

                <?php endforeach; ?>

                <?= Html::tag('a', 'Загрузить еще',['class' => 'btn btn-primary', 'href' => "#"]); ?>

            </div>

        <?php else: ?>

            <span>Картинок нет</span>

        <?php endif; ?>

    </div>

<?php ActiveForm::end(); ?>