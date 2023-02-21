<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $all_img
 * @property int $id_gorod
 * @property int $id_bank_card
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $phone_number
 * @property string $currency
 * @property string $date_of_birth
 * @property string $sex
 * @property string $role
 *
 * @property AllImg $allImg
 * @property BankCard $bankCard
 * @property Basket[] $baskets
 * @property DeliveryAddress[] $deliveryAddresses
 * @property Favourite[] $favourites
 * @property Gorod $gorod
 * @property Review[] $reviews
 * @property Zakaz[] $zakazs
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gorod', 'id_bank_card', 'name', 'login', 'password', 'email', 'phone_number', 'currency', 'sex', 'role'], 'required', 'message' => 'Поле обязательно для заполнения'],
            [['id_gorod', 'id_bank_card'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['name', 'login', 'password', 'email', 'phone_number', 'currency', 'sex', 'role', 'all_img'], 'string', 'max' => 250],
            [['id_bank_card'], 'exist', 'skipOnError' => true, 'targetClass' => BankCard::class, 'targetAttribute' => ['id_bank_card' => 'id']],
            [['id_gorod'], 'exist', 'skipOnError' => true, 'targetClass' => Gorod::class, 'targetAttribute' => ['id_gorod' => 'id']],
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
            'id_gorod' => 'Город',
            'id_bank_card' => 'Банковская карта',
            'name' => 'Имя',
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
            'phone_number' => 'Номер телефона',
            'currency' => 'Валюта',
            'date_of_birth' => 'Дата рождения',
            'sex' => 'Пол',
            'role' => 'Роль',
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
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[DeliveryAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['id_user' => 'id']);
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
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Zakazs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazs()
    {
        return $this->hasMany(Zakaz::class, ['id_user' => 'id']);
    }




    /*Реализация интерфейса*/

      /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
     
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
