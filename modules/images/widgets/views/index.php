<?php
use yii\widgets\Pjax;

$js = <<< JS
   $('#btn-wg-images').click(function(){
        $('#wg-images').modal('show');
        if ($('#content-wg-images').html().trim() === ''){//Проверка на пустой элемент
            $.ajax({
                url: '/admin/images/default/images',
                success: function (res) {
                    $("#content-wg-images").append(res);
                    console.log(res);
                },
                error: function () {alert('Ошибка')}
            });
        }
    });

JS;

$this->registerJs($js);

?>


<style>

    .wg-images .modal-body > div:not(:last-child){
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

<a href="#" class="btn btn-primary uploads-image" id="btn-wg-images">
    <i class="fas fa-upload"></i> Загрузить картинки
</a>

<div class="modal fade wg-images" id="wg-images" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="content-wg-images">


            </div>
        </div>
    </div>
</div>