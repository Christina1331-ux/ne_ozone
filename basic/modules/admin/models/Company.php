<?php

namespace app\modules\admin\models;

use Yii;


/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $all_img
 * @property string $name
 * @property string $tin
 * @property string $created_at
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property AllImg $allImg
 * @property Product[] $products
 */
class Company extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['all_img', 'name', 'tin', 'created_at', 'updated_at', 'updated_by'], 'required', 'message' => 'Поле не может быть пустым'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'tin', 'updated_by', 'all_img'], 'string', 'max' => 250],

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
            'name' => 'Название',
            'tin' => 'ИНН',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'updated_by' => 'Автор записи',
        ];
    }


    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id_company' => 'id']);
    }
}
