<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "zakaz_information".
 *
 * @property int $id
 * @property int $id_product
 * @property int $id_bank_card
 * @property int $id_delivery_address
 * @property string $delivery_type
 * @property string $created_at
 *
 * @property BankCard $bankCard
 * @property DeliveryAddress $deliveryAddress
 * @property Product $product
 */
class ZakazInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakaz_information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'id_bank_card', 'id_delivery_address', 'delivery_type', 'created_at'], 'required', 'message' => 'Поле не может быть пустым'],
            [['id_product', 'id_bank_card', 'id_delivery_address'], 'integer'],
            [['created_at'], 'safe'],
            [['delivery_type'], 'string', 'max' => 250],
            [['id_bank_card'], 'exist', 'skipOnError' => true, 'targetClass' => BankCard::class, 'targetAttribute' => ['id_bank_card' => 'id']],
            [['id_delivery_address'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryAddress::class, 'targetAttribute' => ['id_delivery_address' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Товар',
            'id_bank_card' => 'Банковская карта',
            'id_delivery_address' => 'Адрес доставки',
            'delivery_type' => 'Способ доставки',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * Gets query for [[BankCard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankCard()
    {
        return $this->hasOne(BankCard::class, ['id' => 'id_bank_card']);
    }

    /**
     * Gets query for [[DeliveryAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddress()
    {
        return $this->hasOne(DeliveryAddress::class, ['id' => 'id_delivery_address']);
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
}
