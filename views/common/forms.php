<?php
use app\components\commonList;
use app\modules\user\widgets\BlockForms;
use yii\helpers\Url;

?>

<div class="common-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12 title-main">
                <i class="far fa-door-open fa-2x"></i>
                <p>Авторизация | Регистрация | Восстановление | Отправка</p>
            </div>

            <?php if (!Yii::$app->user->isGuest): ?>

                <div class="col-md-6 div-common-forms">
                    <a href="/admin" class="btn btn-danger common-forms-btn">Админка</a>
                </div>

                <div class="col-md-3 div-common-forms">
                    <a href="/logout" class="btn btn-primary common-forms-btn">Выйти</a>
                </div>
            <?php else: ?>

                <?= BlockForms::widget(['filename'=>'SignInForm']) ?>

                <?= BlockForms::widget(['filename'=>'SignUpForm']) ?>



            <?php endif; ?>




        </div>

    </div>
</div>


