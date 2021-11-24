<?php
/* @var $products app\modules\catalog\models\Product[] */
use app\components\commonList;
use yii\helpers\Url;

?>


<div class="common-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12 title-main">
                <i class="far fa-bars fa-2x"></i>
                <p>Категории</p>
            </div>

            <?= commonList::widget(['filename' => 'category@block-category']); ?>

        </div>

    </div>
</div>
