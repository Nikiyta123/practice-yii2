<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\components\commonList;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\category\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;


$js = <<< JS
   
        function CategorySortAjax(position){
             $.ajax({
                 url: 'changing-positions',
                 type: 'GET',
                 data:{position: position},
                 success: function (res) {},
                 error: function () {alert('Ошибка')}
             });
        }
   
        $(".main-ul, .main-ul li > ul").sortable({
            group: 'nested',
            revert: 80,
            handle: '.icons-category',
            update: function(event, ui) {
                let position = $(event.target).getPos('> li');
                CategorySortAjax(position);
            }
        });

        $(".box-sortable").sortable({
            group: 'nested',
            revert: 80,
            handle: '.box-title-custom',
            update: function(event, ui) {
                let position = $(event.target).getPos('> div');
                CategorySortAjax(position);
            }
        });

        $.fn.getPos = function(tag) {
            let array = [];
            let elem = $(this);
            elem.each(function(i) {
                let menu = this.id;
                $(tag, this).each(function(e) {
                    array.push(this.id);
                });
            });
            return array.join('@');
        };
        
        

    
    
JS;

$this->registerJs($js);

?>
<div class="content-header">
    <h1>
        <?= Html::encode($this->title) ?>  <?= $this->blocks['content-header'] ?>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </h1>
    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
</div>

<div class="content list-category">
    <div class="box-buttons">

    </div>
    <div class="row box-sortable">

        <?= commonList::widget(['filename' => 'category@admin-category']); ?>

    </div>

</div>


