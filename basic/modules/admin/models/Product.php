<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $all_img
 * @property int $id_category
 * @property int $id_company
 * @property string $name
 * @property float $price
 * @property float $sale_price
 * @property int $flag
 * @property string $description
 * @property string $characteristic
 * @property string $instruction
 * @property float $rating
 * @property string $created_at
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property AllImg $allImg
 * @property Basket[] $baskets
 * @property Category $category
 * @property Company $company
 * @property Favourite[] $favourites
 * @property Review[] $reviews
 * @property ZakazInformation[] $zakazInformations
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['all_img', 'id_category', 'id_company', 'name', 'price', 'sale_price', 'flag', 'description', 'characteristic', 'instruction', 'rating', 'created_at', 'updated_at', 'updated_by'], 'required', 'message' => 'Поле не может быть пустым'],
            [['id_category', 'id_company', 'flag'], 'integer'],
            [['price', 'sale_price', 'rating'], 'number'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'characteristic', 'instruction','all_img', 'updated_by'], 'string', 'max' => 250],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'all_img' => 'Изображение',
            'id_category' => 'Категория',
            'id_company' => 'Компания',
            'name' => 'Название',
            'price' => 'Цена',
            'sale_price' => 'Цена со скидкой',
            'flag' => 'Флаг продукта акционного',
            'description' => 'Описание',
            'characteristic' => 'Характеристика',
            'instruction' => 'Инструкция',
            'rating' => 'Рейтинг',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'updated_by' => 'Автор записи',
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[ZakazInformations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazInformations()
    {
        return $this->hasMany(ZakazInformation::class, ['id_product' => 'id']);
    }
}
