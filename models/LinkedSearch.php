<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Linked;

/**
 * LinkedSearch represents the model behind the search form of `app\models\Linked`.
 */
class LinkedSearch extends Linked
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lid', 'sk_id', 'user', 'cv_id', 'status'], 'integer'],
            [['begin', 'end', 'klcv'], 'safe'],
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
        $query = Linked::find();

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
            'lid' => $this->lid,
            'sk_id' => $this->sk_id,
            'user' => $this->user,
            'cv_id' => $this->cv_id,
            'begin' => $this->begin,
            'end' => $this->end,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'klcv', $this->klcv]);

        return $dataProvider;
    }
}
