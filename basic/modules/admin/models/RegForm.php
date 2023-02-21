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
class RegForm extends User
{
    public $passwordConfirm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gorod', 'id_bank_card', 'name', 'login', 'password', 'passwordConfirm', 'email', 'phone_number', 'currency', 'sex', 'role'], 'required', 'message' =>'Поле обязательное для заполнения'],
            [['id_gorod', 'id_bank_card'], 'integer'],
            ['name', 'match', 'pattern' => '/^[А-Яа-я\s\-]{5,}$/u', 'message' => 'Только кириллица, пробелы и дефисы'],
            ['login', 'match', 'pattern' => '/^[A-za-z0-9]{1,}$/u', 'message' => 'Только латинские буквы'],
            ['email', 'email','message' => 'Почта введена неверно'],
            [['date_of_birth'], 'safe'],
            ['passwordConfirm', 'compare', 'compareAttribute' =>'password', 'message' => 'Пароли должны совпадать'],
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
            'passwordConfirm' => 'Подтверждение пароля',
            'email' => 'Email',
            'phone_number' => 'Номер телефона',
            'currency' => 'Валюта',
            'date_of_birth' => 'Дата рождения',
            'sex' => 'Пол',
            'role' => 'Роль',
        ];
    }

}
