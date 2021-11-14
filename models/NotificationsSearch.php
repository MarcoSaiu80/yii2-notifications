<?php

namespace webzop\notifications\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notifications;

/**
 * NotificationsSearch represents the model behind the search form of `app\models\Notifications`.
 */
class NotificationsSearch extends Notifications
{
    /**
     * {@inheritdoc}
     */

    public $data_ricerca_da;
    public $data_ricerca_a;
    public function rules()
    {
        return [
            [['id', 'seen', 'read', 'user_id', 'created_at'], 'integer'],
            [['class', 'key', 'message', 'route','data_ricerca_da','data_ricerca_a'], 'safe'],
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
        $query = Notifications::find();

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
            'seen' => $this->seen,
            'read' => $this->read,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'route', $this->route]);

        return $dataProvider;
    }
}
