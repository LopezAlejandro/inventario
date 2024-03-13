<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BiblioItems;

/**
 * app\models\BiblioItemsSearch represents the model behind the search form about `app\models\BiblioItems`.
 */
 class BiblioItemsSearch extends BiblioItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biblioitemnumber', 'biblionumber', 'totalissues'], 'integer'],
            [['volume', 'number', 'itemtype', 'isbn', 'issn', 'ean', 'publicationyear', 'publishercode', 'volumedate', 'volumedesc', 'collectiontitle', 'collectionissn', 'collectionvolume', 'editionstatement', 'editionresponsibility', 'timestamp', 'illus', 'pages', 'notes', 'size', 'place', 'lccn', 'url', 'cn_source', 'cn_class', 'cn_item', 'cn_suffix', 'cn_sort', 'agerestriction'], 'safe'],
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
        $query = BiblioItems::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'biblioitemnumber' => $this->biblioitemnumber,
            'biblionumber' => $this->biblionumber,
            'volumedate' => $this->volumedate,
            'timestamp' => $this->timestamp,
            'totalissues' => $this->totalissues,
        ]);

        $query->andFilterWhere(['like', 'volume', $this->volume])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'itemtype', $this->itemtype])
            ->andFilterWhere(['like', 'isbn', $this->isbn])
            ->andFilterWhere(['like', 'issn', $this->issn])
            ->andFilterWhere(['like', 'ean', $this->ean])
            ->andFilterWhere(['like', 'publicationyear', $this->publicationyear])
            ->andFilterWhere(['like', 'publishercode', $this->publishercode])
            ->andFilterWhere(['like', 'volumedesc', $this->volumedesc])
            ->andFilterWhere(['like', 'collectiontitle', $this->collectiontitle])
            ->andFilterWhere(['like', 'collectionissn', $this->collectionissn])
            ->andFilterWhere(['like', 'collectionvolume', $this->collectionvolume])
            ->andFilterWhere(['like', 'editionstatement', $this->editionstatement])
            ->andFilterWhere(['like', 'editionresponsibility', $this->editionresponsibility])
            ->andFilterWhere(['like', 'illus', $this->illus])
            ->andFilterWhere(['like', 'pages', $this->pages])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'lccn', $this->lccn])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'cn_source', $this->cn_source])
            ->andFilterWhere(['like', 'cn_class', $this->cn_class])
            ->andFilterWhere(['like', 'cn_item', $this->cn_item])
            ->andFilterWhere(['like', 'cn_suffix', $this->cn_suffix])
            ->andFilterWhere(['like', 'cn_sort', $this->cn_sort])
            ->andFilterWhere(['like', 'agerestriction', $this->agerestriction]);

        return $dataProvider;
    }
}
