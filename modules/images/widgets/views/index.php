<?php
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

$js = <<< JS
    
   $('#btn-wg-images').click(function(){
        $.pjax({          
            type       : 'POST',
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

    .wg-images .all-wg-images{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 0.5em;
        max-height: 400px;
        overflow: auto;
    }

    .wg-images .common-div-wg-images:not(:last-child){
        margin-bottom: 10px;
    }

    .wg-images .all-wg-images .block-for-wg-images{
        display: flex;
        align-items: center;
        height: 100px;
        position: relative;
    }

    .wg-images .all-wg-images .block-for-wg-images .wg-input {
        position: absolute;
        bottom: 0;
        right: 0;
        cursor: pointer;
        width: 17px;
        height: 17px;
        border-radius: 0;
        border: 0;
    }

    .wg-images .all-wg-images .block-for-wg-images .wg-label{
        display: flex;
        align-items: center;
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .wg-images .all-wg-images .block-for-wg-images .wg-label img{
        height: 100%;
        width: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .wg-images .all-wg-images .block-for-wg-images .wg-input[type=checkbox]:checked + .wg-label{

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





<?php Pjax::begin([
    'id' => 'pjaxViewWgImages',
    'enablePushState' => false,
    'timeout' => 5000
]); ?>



<?php Pjax::end(); ?>

