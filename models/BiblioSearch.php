<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Biblio;

/**
 * BiblioSearch represents the model behind the search form of `app\models\Biblio`.
 */
class BiblioSearch extends Biblio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biblionumber', 'serial', 'copyrightdate'], 'integer'],
            [['frameworkcode', 'author', 'title', 'medium', 'subtitle', 'part_number', 'part_name', 'unititle', 'notes', 'seriestitle', 'timestamp', 'datecreated', 'abstract'], 'safe'],
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
        $query = Biblio::find();

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
            'biblionumber' => $this->biblionumber,
            'serial' => $this->serial,
            'copyrightdate' => $this->copyrightdate,
            'timestamp' => $this->timestamp,
            'datecreated' => $this->datecreated,
        ]);

        $query->andFilterWhere(['like', 'frameworkcode', $this->frameworkcode])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'medium', $this->medium])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'part_number', $this->part_number])
            ->andFilterWhere(['like', 'part_name', $this->part_name])
            ->andFilterWhere(['like', 'unititle', $this->unititle])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'seriestitle', $this->seriestitle])
            ->andFilterWhere(['like', 'abstract', $this->abstract]);

        return $dataProvider;
    }
}
