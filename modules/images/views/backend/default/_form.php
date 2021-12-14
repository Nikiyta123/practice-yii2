<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\images\models\Images */
/* @var $form yii\widgets\ActiveForm */
$js = <<< JS
    $('#wg-images-form').on('beforeSubmit', function (e) {
        let wgform = $(this);
        let formData = new FormData($('#wg-images-form')[0]);
        $.pjax({
            type       : 'POST',
            url        : wgform.attr('action'),
            container  : '#pjaxContentWgImages',
            data       : formData,
            cache      : false,
            contentType: false,
            processData: false ,
            push       : false,
            timeout    : 5000,
        });
        return false;
    });
    
JS;

$this->registerJs($js);
?>


<?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'wg-images-form',
        'action' => Url::to(['save']),
        'validationUrl' => Url::to(['validation-form']),
        'enableAjaxValidation' => true,
        //'validateOnSubmit' => true,
        //'validateOnChange' => false,
        //'validateOnBlur' => false,

]); ?>

    <?= $form->field($model, 'images[]')->fileInput(['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Загрузить', ['class' => 'btn btn-default wg-images-button']) ?>
    </div>

<?php ActiveForm::end(); ?>



