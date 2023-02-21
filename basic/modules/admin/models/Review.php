<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_product
 * @property int $id_all_img
 * @property string $advantage
 * @property string $disadvantage
 * @property string $text
 * @property float $rating
 * @property string $created_at
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property AllImg $allImg
 * @property Product $product
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_product', 'id_all_img', 'advantage', 'disadvantage', 'text', 'rating', 'created_at', 'updated_at', 'updated_by'], 'required', 'message' => 'Поле не может быть пустым'],
            [['id_user', 'id_product', 'id_all_img'], 'integer'],
            [['text'], 'string'],
            [['rating'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['advantage', 'disadvantage', 'updated_by'], 'string', 'max' => 250],
            [['id_all_img'], 'exist', 'skipOnError' => true, 'targetClass' => AllImg::class, 'targetAttribute' => ['id_all_img' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Пользователь',
            'id_product' => 'Товар',
            'id_all_img' => 'Изображение',
            'advantage' => 'Достоинства',
            'disadvantage' => 'Недостатки',
            'text' => 'Описание',
            'rating' => 'Рейтинг',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'updated_by' => 'Автор записи',
        ];
    }

    /**
     * Gets query for [[AllImg]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAllImg()
    {
        return $this->hasOne(AllImg::class, ['id' => 'id_all_img']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
