<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\user\models\User;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("

    $(document).on('pjax:click', function(e) {
      
        $('#update-box').waitMe({
            effect: 'ios', //none, bounce, rotateplane, stretch, orbit, roundBounce, win8, win8_linear or ios
            //text: 'Please waiting...',
            bg: 'rgba(255,255,255,0.7)',
            color:'#000'
        });
    
    })
    
    $(document).on('pjax:complete', function() {
        $('#update-box').waitMe('hide');
    })
    
    $('#summary-count').on('change', function(){
        let pageSize = $(this).val();       
        $.pjax.reload({
            container: '#pjaxTableResponsive',
            type       : 'POST',
            url        : '',
            data       : {pageSize:pageSize},
            timeout    : 5000,
        });     
    });

");

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

                <div class="col-md-1">
                    <?= Html::dropDownList('summary-count', 'null', [15 => 15, 25 => 25, 50 => 50, 75 => 75, 100 => 100],['id' => 'summary-count']); ?>
                </div>

                <div class="col-xs-12 table-responsive">

                    <?php Pjax::begin([
                        'id' => 'pjaxTableResponsive',
                        'scrollTo' => 1,
                        'timeout' => 5000
                    ]); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'layout'=>"<div class='GridView-pager-summary'>{summary}\n{pager}</div>\n{items}<div class='GridView-pager'>\n{pager}</div>",
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                'username',
                                'phone',
                                //'password',
                                'email:email',
                                'isAdmin',
                                //'authKey',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>

                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>


