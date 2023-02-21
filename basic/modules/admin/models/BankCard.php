<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "bank_card".
 *
 * @property int $id
 * @property string $number
 * @property string $validati_thru
 * @property int $cvv
 *
 * @property User[] $users
 * @property ZakazInformation[] $zakazInformations
 */
class BankCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'validati_thru', 'cvv'], 'required', 'message' => 'Поле не может быть пустым'],
            [['cvv'], 'integer'],
            [['number'], 'string', 'max' => 250],
            [['validati_thru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер карты',
            'validati_thru' => 'Срок действия карты',
            'cvv' => 'Cvv',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_bank_card' => 'id']);
    }

    /**
     * Gets query for [[ZakazInformations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazInformations()
    {
        return $this->hasMany(ZakazInformation::class, ['id_bank_card' => 'id']);
    }
}
