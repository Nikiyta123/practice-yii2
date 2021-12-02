<?php
use yii\widgets\Pjax;
use yii\bootstrap\Modal;


$js = <<< JS
    
   $('#btn-wg-images').click(function(){
        $.pjax({          
            url        : '/admin/images/default/index',
            container  : '#pjaxContentWgImages',
            push       : false,
            timeout    : 5000,      
        });
    });

    
JS;

$this->registerJs($js);

?>

<style>

    .wg-images .mb-center{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: 0.5em;
        max-height: 400px;
        overflow: auto;
    }
    .wg-images .mb-center img{
        max-height: 100px;
        width: 100%;
    }
    .wg-images .common-div-wg-images:not(:last-child){
        margin-bottom: 10px;
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


    <?php Pjax::end(); ?>

<?php Modal::end(); ?>
