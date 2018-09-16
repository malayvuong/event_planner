<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sukien;

/**
 * SukienSearch represents the model behind the search form of `app\models\Sukien`.
 */
class SukienSearch extends Sukien
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sk_id', 'sk_status'], 'integer'],
            [['sk_name', 'sk_khuvuc', 'sk_time', 'sk_begin', 'sk_end', 'sk_address', 'sk_note'], 'safe'],
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
        $query = Sukien::find();

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
            'sk_id' => $this->sk_id,
            'sk_time' => $this->sk_time,
            'sk_begin' => $this->sk_begin,
            'sk_end' => $this->sk_end,
            'sk_status' => $this->sk_status,
        ]);

        $query->andFilterWhere(['like', 'sk_name', $this->sk_name])
            ->andFilterWhere(['like', 'sk_khuvuc', $this->sk_khuvuc])
            ->andFilterWhere(['like', 'sk_address', $this->sk_address])
            ->andFilterWhere(['like', 'sk_note', $this->sk_note]);

        return $dataProvider;
    }
}
