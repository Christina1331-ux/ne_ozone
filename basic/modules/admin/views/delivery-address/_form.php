<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\DeliveryAddress $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="delivery-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $gorod = app\modules\admin\models\Gorod::find()->all();
        $items = ArrayHelper::map($gorod,'id','name');
        $params = [
            'prompt' => 'Выберите город'
        ];
        echo $form->field($model, 'id_gorod')->dropDownList($items,$params);
    ?>

    <?php
        $user = app\modules\admin\models\User::find()->all();
        $items = ArrayHelper::map($user,'id_gorod', 'id_bank_card', 'name', 'login', 'password', 'email', 'phone_number', 'currency', 'date_of_birth', 'sex', 'role');
        $params = [
            'prompt' => 'Выберите пользователя'
        ];
        echo $form->field($model, 'id_user')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
