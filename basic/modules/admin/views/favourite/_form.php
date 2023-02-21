<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Favourite $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="favourite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $product = app\modules\admin\models\Product::find()->all();
        $items = ArrayHelper::map($product,'id_all_img', 'id_category', 'id_company', 'name', 'price', 'sale_price', 'flag', 'description', 'characteristic', 'instruction', 'rating', 'created_at', 'updated_at', 'updated_by');
        $params = [
            'prompt' => 'Выберите товар'
        ];
        echo $form->field($model, 'id_product')->dropDownList($items,$params);
    ?>

    <?php
        $user = app\modules\admin\models\User::find()->all();
        $items = ArrayHelper::map($user,'id_gorod', 'id_bank_card', 'name', 'login', 'password', 'email', 'phone_number', 'currency', 'date_of_birth', 'sex', 'role');
        $params = [
            'prompt' => 'Выберите пользователя'
        ];
        echo $form->field($model, 'id_user')->dropDownList($items,$params);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
