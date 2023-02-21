<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "delivery_address".
 *
 * @property int $id
 * @property int $id_gorod
 * @property int $id_user
 * @property string $name
 * @property string $street
 * @property string $home
 * @property string $flat
 * @property string $comment
 *
 * @property Gorod $gorod
 * @property User $user
 * @property ZakazInformation[] $zakazInformations
 */
class DeliveryAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gorod', 'id_user', 'name', 'street', 'home', 'flat', 'comment'], 'required', 'message' => 'Поле не может быть пустым'],
            [['id_gorod', 'id_user'], 'integer'],
            [['comment'], 'string'],
            [['name', 'street', 'home', 'flat'], 'string', 'max' => 250],
            [['id_gorod'], 'exist', 'skipOnError' => true, 'targetClass' => Gorod::class, 'targetAttribute' => ['id_gorod' => 'id']],
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
            'id_gorod' => 'Город',
            'id_user' => 'Пользователь',
            'name' => 'Название',
            'street' => 'Улица',
            'home' => 'Дом',
            'flat' => 'Квартира',
            'comment' => 'Коментарий курьеру',
        ];
    }

    /**
     * Gets query for [[Gorod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGorod()
    {
        return $this->hasOne(Gorod::class, ['id' => 'id_gorod']);
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

    /**
     * Gets query for [[ZakazInformations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazInformations()
    {
        return $this->hasMany(ZakazInformation::class, ['id_delivery_address' => 'id']);
    }
}
