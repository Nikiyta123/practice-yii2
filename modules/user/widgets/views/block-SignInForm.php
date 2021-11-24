<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

$js = <<<JS

$('#forms-$name').submit(function() {
    
	$('#mb-forms-$name').waitMe({
        effect: 'ios', //none, bounce, rotateplane, stretch, orbit, roundBounce, win8, win8_linear or ios
        //text: 'Please waiting...',
        bg: 'rgba(255,255,255,0.7)',
        color:'#000'
	});
});
    $('#forms-$name').on('ajaxComplete', function(event, messages, deferreds){
        if (messages.responseText != '[]'){
            $('#mb-forms-$name').waitMe('hide');
        }
    });
JS;

$this->registerJs($js);

?>

<?php

Modal::begin([
    'title' => 'Авторизация',
    'toggleButton' => ['label' => 'Авторизация','class' => 'btn btn-primary common-forms-btn'],
    'customToggleButton' => true,
    'bodyOptions' => ['id' => 'mb-forms-'.$name]
]);

?>

    <?php $form = ActiveForm::begin([
        'id' => 'forms-'.$name,
        'action' => Url::to(['/user/default/login-ajax']),
        'validationUrl' => Url::to(['/user/default/validation-forms', 'nameForms' => $name]),
        'layout' => 'horizontal',
        'enableAjaxValidation' => true,
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnBlur' => true,
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-md-12',
                //'offset' => 'offset-sm-4',
                'wrapper' => 'col-md-12',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Логин']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль']); ?>

        <?= $form->field($model, 'rememberMe')->checkbox(); ?>

        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary','id' => 'show-button','name' => 'login-button']); ?>

    <?php ActiveForm::end(); ?>

<?php Modal::end(); ?>


