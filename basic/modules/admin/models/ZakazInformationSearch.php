<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\ZakazInformation;

/**
 * ZakazInformationSearch represents the model behind the search form of `app\modules\admin\models\ZakazInformation`.
 */
class ZakazInformationSearch extends ZakazInformation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_product', 'id_bank_card', 'id_delivery_address'], 'integer'],
            [['delivery_type', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ZakazInformation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_product' => $this->id_product,
            'id_bank_card' => $this->id_bank_card,
            'id_delivery_address' => $this->id_delivery_address,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'delivery_type', $this->delivery_type]);

        return $dataProvider;
    }
}
