<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var app\modules\admin\models\Zakaz $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zakaz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $user = app\modules\admin\models\User::find()->all();
        $items = ArrayHelper::map($user,'id_gorod', 'id_bank_card', 'name', 'login', 'password', 'email', 'phone_number', 'currency', 'date_of_birth', 'sex', 'role');
        $params = [
            'prompt' => 'Выберите пользователя'
        ];
        echo $form->field($model, 'id_user')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'sum_total')->textInput() ?>

    <?= $form->field($model, 'sale_total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
