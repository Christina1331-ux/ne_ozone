<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'all_img')->fileInput() ?>

    <?php
        $gorod = app\modules\admin\models\Gorod::find()->all();
        $items = ArrayHelper::map($gorod,'id','name');
        $params = [
            'prompt' => 'Выберите город'
        ];
        echo $form->field($model, 'id_gorod')->dropDownList($items,$params);
    ?>

    <?php
        $bankcard = app\modules\admin\models\BankCard::find()->all();
        $items = ArrayHelper::map($bankcard,'id','number','validati_thru','cvv');
        $params = [
            'prompt' => 'Выберите карту'
        ];
        echo $form->field($model, 'id_bank_card')->dropDownList($items,$params);
    ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwordConfirm')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?php
    $items = [
        '0'=> 'Червонец',
        '1'=> 'Евро',
        '2'=> 'Доллары',
    ];
    $params = [
        'prompt' => 'Выберите валюту'
    ];
    echo $form->field($model, 'currency')->dropDownList($items,$params);
    ?>


    <?= $form->field($model, 'date_of_birth')->textInput() ?>

    <?php
        $items = [
            '0'=> 'Женский',
            '1'=> 'Мужской',
            '2'=> 'Не указывать',
        ];
        $params = [
            'prompt' => 'Выберите пол'
        ];
        echo $form->field($model, 'sex')->dropDownList($items,$params);
    ?>

    <?php
        $items = [
            '0'=> 'Обычный пользователь',
            '1'=> 'Админ',
        ];
        $params = [
            'prompt' => 'Выберите роль'
        ];
        echo $form->field($model, 'role')->dropDownList($items,$params);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
