<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Club;

/**
 * ClubSearch represents the model behind the search form of `frontend\models\Club`.
 */
class ClubSearch extends Club
{
    public $isDeleted;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by_whom', 'updated_by_whom', 'deleted_by_whom'], 'integer'],
            [['address', 'clubList', 'isDeleted', 'name', 'date_of_creation', 'date_of_update', 'date_of_deletion'], 'safe'],
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
        $query = Club::find();

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
            'name' => $this->name,
            'date_of_creation' => $this->date_of_creation,
            'created_by_whom' => $this->created_by_whom,
            'date_of_update' => $this->date_of_update,
            'updated_by_whom' => $this->updated_by_whom,
            'date_of_deletion' => $this->date_of_deletion,
            'deleted_by_whom' => $this->deleted_by_whom,
        ]);

        if($this->isDeleted){
            $query->andWhere(['not', ['date_of_deletion' => null]]);
        }else{
            $query->andWhere(['date_of_deletion' => null]);
        }

        $query->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
