<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"c\">{input}</div>\n<div class=\"\">{error}</div>",
            'labelOptions' => ['class' => 'control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => 'E-mail']) ?>

    <?= $form->field($model, 'password')->passwordInput()->textInput(['placeholder' => 'Пароль','type' => 'password']) ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"checkboxForm\">{input} {label}</div>\n<div class=\"\">{error}</div>",
    ]) ?>

    <div class="form-group login-and-signup">

        <?= Html::submitButton('Войти', ['class' => 'btn', 'name' => 'login-button']) ?>

    </div>

    <?php ActiveForm::end(); ?>

    <div class="offset-lg-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>
