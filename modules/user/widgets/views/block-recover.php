<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;

?>

<?php

Modal::begin([
    'title' => 'Восстановление',
    'toggleButton' => ['label' => 'Восстановление','class' => 'btn btn-info common-forms-btn'],
    'customToggleButton' => true
]);

?>

    <?php $form = ActiveForm::begin([
        'id' => 'forms-'.$name,
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            //'labelOptions' => ['class' => 'col-md-12 col-form-label'],
        ],
    ]); ?>


        <?= Html::tag('div',
            $form->field($model, 'email')->textInput(['placeholder' => 'Email']),
            ['class' => 'form-group']);
        ?>

        <?= Html::tag('div',
            Html::submitButton('Восстановить', ['class' => 'btn btn-info', 'name' => 'login-button']),
            ['class' => 'form-group']);
        ?>


    <?php ActiveForm::end(); ?>

<?php Modal::end(); ?>


