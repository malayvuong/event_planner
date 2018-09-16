<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Congviec;

/**
 * CongviecSearch represents the model behind the search form of `app\models\Congviec`.
 */
class CongviecSearch extends Congviec
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cv_id'], 'integer'],
            [['cv_name'], 'safe'],
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
        $query = Congviec::find();

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
            'cv_id' => $this->cv_id,
        ]);

        $query->andFilterWhere(['like', 'cv_name', $this->cv_name]);

        return $dataProvider;
    }
}
