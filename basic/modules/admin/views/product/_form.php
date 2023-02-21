<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
        $category = app\modules\admin\models\Category::find()->all();
        $items = ArrayHelper::map($category,'id_parent', 'name');
        $params = [
            'prompt' => 'Выберите Категорию'
        ];
        echo $form->field($model, 'id_category')->dropDownList($items,$params);
    ?>

    <?php
        $company = app\modules\admin\models\Company::find()->all();
        $items = ArrayHelper::map($company,'all_img', 'name', 'tin', 'created_at', 'updated_at', 'updated_by');
        $params = [
            'prompt' => 'Выберите Компанию'
        ];
        echo $form->field($model, 'id_company')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'sale_price')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'characteristic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instruction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput(['readonly' => true, 'value' => date('Y-m-d H:i')])?>

    <?= $form->field($model, 'updated_at')->textInput(['readonly' => true, 'value' => date('Y-m-d H:i')]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
