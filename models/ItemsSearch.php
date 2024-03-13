<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Items;

/**
 * app\models\ItemsSearch represents the model behind the search form about `app\models\Items`.
 */
 class ItemsSearch extends Items
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemnumber', 'biblionumber', 'biblioitemnumber', 'issues', 'renewals', 'reserves'], 'integer'],
            [['barcode', 'dateaccessioned', 'booksellerid', 'homebranch', 'replacementpricedate', 'datelastborrowed', 'datelastseen', 'stack', 'notforloan', 'damaged', 'damaged_on', 'itemlost', 'itemlost_on', 'withdrawn', 'withdrawn_on', 'itemcallnumber', 'coded_location_qualifier', 'restricted', 'itemnotes', 'itemnotes_nonpublic', 'holdingbranch', 'timestamp', 'deleted_on', 'location', 'permanent_location', 'onloan', 'cn_source', 'cn_sort', 'ccode', 'materials', 'uri', 'itype', 'more_subfields_xml', 'enumchron', 'copynumber', 'stocknumber', 'new_status', 'exclude_from_local_holds_priority'], 'safe'],
            [['price', 'replacementprice'], 'number'],
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
        $query = Items::find();

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
            'itemnumber' => $this->itemnumber,
            'biblionumber' => $this->biblionumber,
            'biblioitemnumber' => $this->biblioitemnumber,
            'dateaccessioned' => $this->dateaccessioned,
            'price' => $this->price,
            'replacementprice' => $this->replacementprice,
            'replacementpricedate' => $this->replacementpricedate,
            'datelastborrowed' => $this->datelastborrowed,
            'datelastseen' => $this->datelastseen,
            'damaged_on' => $this->damaged_on,
            'itemlost_on' => $this->itemlost_on,
            'withdrawn_on' => $this->withdrawn_on,
            'issues' => $this->issues,
            'renewals' => $this->renewals,
            'reserves' => $this->reserves,
            'timestamp' => $this->timestamp,
            'deleted_on' => $this->deleted_on,
            'onloan' => $this->onloan,
        ]);

        $query->andFilterWhere(['like', 'barcode', $this->barcode])
            ->andFilterWhere(['like', 'booksellerid', $this->booksellerid])
            ->andFilterWhere(['like', 'homebranch', $this->homebranch])
            ->andFilterWhere(['like', 'stack', $this->stack])
            ->andFilterWhere(['like', 'notforloan', $this->notforloan])
            ->andFilterWhere(['like', 'damaged', $this->damaged])
            ->andFilterWhere(['like', 'itemlost', $this->itemlost])
            ->andFilterWhere(['like', 'withdrawn', $this->withdrawn])
            ->andFilterWhere(['like', 'itemcallnumber', $this->itemcallnumber])
            ->andFilterWhere(['like', 'coded_location_qualifier', $this->coded_location_qualifier])
            ->andFilterWhere(['like', 'restricted', $this->restricted])
            ->andFilterWhere(['like', 'itemnotes', $this->itemnotes])
            ->andFilterWhere(['like', 'itemnotes_nonpublic', $this->itemnotes_nonpublic])
            ->andFilterWhere(['like', 'holdingbranch', $this->holdingbranch])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'permanent_location', $this->permanent_location])
            ->andFilterWhere(['like', 'cn_source', $this->cn_source])
            ->andFilterWhere(['like', 'cn_sort', $this->cn_sort])
            ->andFilterWhere(['like', 'ccode', $this->ccode])
            ->andFilterWhere(['like', 'materials', $this->materials])
            ->andFilterWhere(['like', 'uri', $this->uri])
            ->andFilterWhere(['like', 'itype', $this->itype])
            ->andFilterWhere(['like', 'more_subfields_xml', $this->more_subfields_xml])
            ->andFilterWhere(['like', 'enumchron', $this->enumchron])
            ->andFilterWhere(['like', 'copynumber', $this->copynumber])
            ->andFilterWhere(['like', 'stocknumber', $this->stocknumber])
            ->andFilterWhere(['like', 'new_status', $this->new_status])
            ->andFilterWhere(['like', 'exclude_from_local_holds_priority', $this->exclude_from_local_holds_priority]);

        return $dataProvider;
    }
}
