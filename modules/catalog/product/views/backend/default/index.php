<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\catalog\product\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-header">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
</div>
<div class="content">
    <div class="box">
        <div class="box-header with-border">
            <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Быстрое добавление', ['create'], ['class' => 'btn btn-default']) ?>
        </div>
        <div class="box-body" id="update-box">
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <?php Pjax::begin([
                        'id' => 'pjaxTableResponsive',
                        'scrollTo' => 1,
                        'timeout' => 5000
                    ]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'name',
                            'price',
                            'category_id',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
