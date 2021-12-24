<?php

namespace app\modules\catalog\product\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\catalog\product\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\modules\catalog\product\models\Product`.
 */
class ProductSearch extends Product
{
    public $priceMin;
    public $priceMax;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'category_id','priceMin','priceMax'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'priceMin' => 'Мин',
            'priceMax' => 'Макс',
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
        $query = Product::find();

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
            'category_id' => $this->category_id,
        ]);
        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['>=', 'price', $this->priceMin])
            ->andFilterWhere(['<=', 'price', $this->priceMax]);

        return $dataProvider;
    }
}
