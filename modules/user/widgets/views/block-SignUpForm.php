<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use borales\extensions\phoneInput\PhoneInput;

$js = <<<JS

$('#forms-$name').submit(function() {
    
	$('#mb-forms-$name').waitMe({
        effect: 'ios', //none, bounce, rotateplane, stretch, orbit, roundBounce, win8, win8_linear or ios
        //text: 'Please waiting...',
        bg: 'rgba(255,255,255,0.7)',
        color:'#000'
	});
	
    $('#forms-$name').on('ajaxComplete', function(event, messages, deferreds){
        if (messages.responseText != '[]'){
            $('#mb-forms-$name').waitMe('hide');
        }
    });
	
});

JS;

$this->registerJs($js);

?>

<?php

Modal::begin([
    'title' => 'Регистрация',
    'clientOptions' =>[
        //'backdrop' => 'static'
    ],
    'toggleButton' => ['label' => 'Регистрация','class' => 'btn btn-success common-forms-btn'],
    'customToggleButton' => true,
    'bodyOptions' => ['id' => 'mb-forms-'.$name]
]);

?>

    <?php $form = ActiveForm::begin([
        'id' => 'forms-'.$name,
        'action' => Url::to(['/user/default/sign-up-ajax']),
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

        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Логин'])->label('Логин'); ?>

        <?= $form->field($model, 'phone')->widget(PhoneInput::className(), [
            'jsOptions' => [
                'preferredCountries' => ['ru', 'ua', 'kz'],
            ]
        ])->label('Телефон (необ.)'); ?>

        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label('Email'); ?>

        <?= $form->field($model, 'password',['inputOptions' => ['class' => 'form-control password-show']])->passwordInput(['placeholder' => 'Пароль'])->label('Пароль'); ?>

        <?= $form->field($model, 'passwordRepeat')->passwordInput(['placeholder' => 'Повторите'])->label('Повторите'); ?>

        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success', 'name' => 'login-button']); ?>

    <?php ActiveForm::end(); ?>

<?php Modal::end(); ?>


