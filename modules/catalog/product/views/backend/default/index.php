<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use app\modules\catalog\category\models\Category;

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;

$category = new Category;
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
                            'name',
                            [
                                'attribute' => 'price',
                                'filter' =>
                                    Html::tag(
                                        'div',
                                        Html::tag('div', Html::activeTextInput($searchModel, 'priceMin', ['class' => 'form-control','placeholder' => 'от'])) .
                                        Html::tag('div', Html::activeTextInput($searchModel, 'priceMax', ['class' => 'form-control','placeholder' => 'до']))
                                    ),
                            ],
                            [
                                'attribute' => 'category_id',
                                'value' => function ($data) {
                                    return $data->category->name;
                                },
                                'filter' => Html::activeDropDownList($searchModel, 'category_id',
                                    $category->BuildFullTree($category->FullTree()),
                                    [
                                        'options' => $category->ExeptionBulding(1),
                                        'prompt' => 'Все',
                                        'class' => 'form-control'
                                    ]),
                            ],

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
