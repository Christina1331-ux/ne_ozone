<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\ZakazInformation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zakaz-information-form">

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
        $bankcard = app\modules\admin\models\BankCard::find()->all();
        $items = ArrayHelper::map($bankcard,'id','number','validati_thru','cvv');
        $params = [
            'prompt' => 'Выберите карту'
        ];
        echo $form->field($model, 'id_bank_card')->dropDownList($items,$params);
    ?>

    <?php
        $deliveryaddress = app\modules\admin\models\DeliveryAddress::find()->all();
        $items = ArrayHelper::map($deliveryaddress,'id_gorod', 'id_user', 'name', 'street', 'home', 'flat', 'comment');
        $params = [
            'prompt' => 'Выберите адрес доставки'
        ];
        echo $form->field($model, 'id_delivery_address')->dropDownList($items,$params);
    ?>

    <?php
        $items = [
            '0'=> 'Курьер',
            '1'=> 'Самовывоз',
        ];
        $params = [
            'prompt' => 'Выберите способ доставки'
        ];
        echo $form->field($model, 'delivery_type')->dropDownList($items,$params);
    ?>


    <?= $form->field($model, 'created_at')->textInput(['readonly' => true, 'value' => date('Y-m-d H:i')]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
