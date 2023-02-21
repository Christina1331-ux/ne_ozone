<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $items = [];
    if(Yii::$app->user->isGuest){
        $items[] = ['label' => 'Регистрация', 'url' => ['/admin/user/create']];
        $items[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
    } else {
        if(Yii::$app->user->identity->role == 1){
            $items[] = ['label' => 'Административная панель', 'url' => ['/admin/admin']];
            $items[] = ['label' => 'Изображения', 'url' => ['/admin/all-img/create']];
            $items[] = ['label' => 'Банковская карта', 'url' => ['/admin/bank-card/create']];
            $items[] =['label' => 'Корзина', 'url' => ['/admin/basket/create']];
            $items[] = ['label' => 'Категории', 'url' => ['/admin/category/create']];
            $items[] =['label' => 'Компании', 'url' => ['/admin/company/create']];
            $items[] =['label' => 'Адрес доставки', 'url' => ['/admin/delivery-address/create']];
            $items[] =['label' => 'Избранное', 'url' => ['/admin/favourite/create']];
            $items[] =['label' => 'Город', 'url' => ['/admin/gorod/create']];
            $items[] =['label' => 'Товары', 'url' => ['/admin/product/create']];
            $items[] =['label' => 'Отзывы', 'url' => ['/admin/review/create']];
            $items[] =['label' => 'Регистрация', 'url' => ['/admin/user/create']];
            $items[] =['label' => 'Заказ', 'url' => ['/admin/zakaz/create']];
            $items[] =['label' => 'Информация о заказе', 'url' => ['/admin/zakaz-information/create']];
        } else{
            $items[] = ['label' => 'Личный кабинет', 'url' => ['/user']];
        }
        $items[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->login . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items,
     /*   'items' => [
          ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Изображения', 'url' => ['/admin/all-img/create']],
            ['label' => 'Банковская карта', 'url' => ['/admin/bank-card/create']],
            ['label' => 'Корзина', 'url' => ['/admin/basket/create']],
            ['label' => 'Категории', 'url' => ['/admin/category/create']],
            ['label' => 'Компании', 'url' => ['/admin/company/create']],
            ['label' => 'Адрес доставки', 'url' => ['/admin/delivery-address/create']],
            ['label' => 'Избранное', 'url' => ['/admin/favourite/create']],
            ['label' => 'Город', 'url' => ['/admin/gorod/create']],
            ['label' => 'Товары', 'url' => ['/admin/product/create']],
            ['label' => 'Отзывы', 'url' => ['/admin/review/create']],
            ['label' => 'Регистрация', 'url' => ['/admin/user/create']],
            ['label' => 'Заказ', 'url' => ['/admin/zakaz/create']],
            ['label' => 'Информация о заказе', 'url' => ['/admin/zakaz-information/create']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизация', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    */
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
