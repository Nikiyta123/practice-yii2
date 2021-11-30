<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

?>

<div id="content-wg-images">
    <div class="mb-up">
        <?= Html::tag('a', '<i class="fas fa-check"> Выбрать</i>',['class' => 'btn btn-success', 'href' => "#"]); ?>
        <?= Html::tag('a', '<i class="fas fa-upload"> Загрузить</i>',['class' => 'btn btn-primary', 'href' => Url::to(['create'])]); ?>
        <?= Html::tag('a', '<i class="fas fa-trash"> Удалить</i>',['class' => 'btn btn-danger', 'href' => Url::to(['delete'])]); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'path',
            'filename',
            'format',
            'size',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
