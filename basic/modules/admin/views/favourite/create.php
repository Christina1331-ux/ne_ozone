<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Favourite $model */

$this->title = 'Добавление избранных';
$this->params['breadcrumbs'][] = ['label' => 'Избранные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
