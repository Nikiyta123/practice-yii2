<?php
use yii\widgets\Pjax;
use yii\bootstrap\Modal;


$js = <<< JS
    
   $('#btn-wg-images').click(function(){
        if ($('#content-wg-images').html().trim() === ''){//Проверка на пустой элемент
            $.ajax({
                url: '/admin/images/default/index',
                success: function (res) {
                    $("#content-wg-images").append(res);
                },
                error: function () {alert('Ошибка')}
            });
        }
    });

    $('#wg-images-form').on('beforeSubmit', function (e) {
        console.log(1);
    });
    
JS;

$this->registerJs($js);

?>

<style>

    .wg-images .modal-body .content-wg-images > div:not(:last-child){
        margin-bottom: 1em;
    }
    .wg-images .mb-center{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: 0.3em;
        max-height: 400px;
        overflow: auto;
    }
    .test{
        height: 100px;
        border: 1px solid black;
    }
</style>


<?php

Modal::begin([
    'toggleButton' => ['label' => '<i class="fas fa-upload"></i> Загрузить картинки','class' => 'btn btn-primary uploads-image','id'=>'btn-wg-images'],
    'options' => ['class' => 'wg-images']
]);?>

    <?php Pjax::begin([
        'id' => 'pjaxContentWgImages',
        'enablePushState' => false,
        'timeout' => 5000
    ]); ?>

        <div class="content-wg-images" id="content-wg-images">


        </div>

    <?php Pjax::end(); ?>

<?php Modal::end(); ?>
