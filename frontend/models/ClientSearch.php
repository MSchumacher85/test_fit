<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Client;

/**
 * ClientSearch represents the model behind the search form of `frontend\models\Client`.
 */
class ClientSearch extends Client
{
    public $date_of_birth_from;
    public $date_of_birth_to;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by_whom', 'updated_by_whom', 'deleted_by_whom'], 'integer'],
            [['date_of_birth_from','date_of_birth_to','FIO', 'sex', 'date_of_birth', 'date_of_creation', 'date_of_update', 'date_of_deletion', 'clubList'], 'safe'],
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
        $query = Client::find();

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
            'clubList' => $this->clubList,
            'date_of_birth' => $this->date_of_birth,
            'date_of_creation' => $this->date_of_creation,
            'created_by_whom' => $this->created_by_whom,
            'date_of_update' => $this->date_of_update,
            'updated_by_whom' => $this->updated_by_whom,
            'date_of_deletion' => $this->date_of_deletion,
            'deleted_by_whom' => $this->deleted_by_whom,
        ]);

        $query->andFilterWhere(['like', 'FIO', $this->FIO])
            ->andFilterWhere(['like', 'sex', $this->sex]);
        if(!empty($this->date_of_birth_from)){
            $query->andFilterWhere(['>=', 'date_of_birth', $this->date_of_birth_from]);
        }
        if(!empty($this->date_of_birth_to)){
            $query->andFilterWhere(['<=', 'date_of_birth', $this->date_of_birth_to]);
        }

        return $dataProvider;
    }
}
