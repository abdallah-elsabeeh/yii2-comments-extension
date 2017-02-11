<?php

namespace abdallah\comments\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use abdallah\comments\models\Comments;

/**
 * commentsSearch represents the model behind the search form about `abdallah\comments\models\Comments`.
 */
class commentsSearch extends Comments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'auther_id', 'object_id', 'reply_on', 'updated_at', 'created_at'], 'integer'],
            [['body', 'status_code', 'auther_taxonomy', 'object_taxonomy'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Comments::find();

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
            'auther_id' => $this->auther_id,
            'object_id' => $this->object_id,
            'reply_on' => $this->reply_on,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'status_code', $this->status_code])
            ->andFilterWhere(['like', 'auther_taxonomy', $this->auther_taxonomy])
            ->andFilterWhere(['like', 'object_taxonomy', $this->object_taxonomy]);

        return $dataProvider;
    }
}
