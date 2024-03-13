<?php

namespace app\models;

use Yii;
use \app\models\base\BiblioItems as BaseBiblioItems;

/**
 * This is the model class for table "biblioitems".
 */
class BiblioItems extends BaseBiblioItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['biblionumber', 'totalissues'], 'integer'],
            [['volume', 'number', 'isbn', 'issn', 'ean', 'publicationyear', 'volumedesc', 'collectiontitle', 'collectionissn', 'collectionvolume', 'editionstatement', 'editionresponsibility', 'notes', 'lccn', 'url'], 'string'],
            [['volumedate', 'timestamp'], 'safe'],
            [['itemtype', 'cn_source', 'cn_item', 'cn_suffix'], 'string', 'max' => 10],
            [['publishercode', 'illus', 'pages', 'size', 'place', 'cn_sort', 'agerestriction'], 'string', 'max' => 255],
            [['cn_class'], 'string', 'max' => 30],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'biblioitemnumber' => 'Biblioitemnumber',
            'biblionumber' => 'Biblionumber',
            'volume' => 'Volume',
            'number' => 'Number',
            'itemtype' => 'Itemtype',
            'isbn' => 'Isbn',
            'issn' => 'Issn',
            'ean' => 'Ean',
            'publicationyear' => 'Publicationyear',
            'publishercode' => 'Publishercode',
            'volumedate' => 'Volumedate',
            'volumedesc' => 'Volumedesc',
            'collectiontitle' => 'Collectiontitle',
            'collectionissn' => 'Collectionissn',
            'collectionvolume' => 'Collectionvolume',
            'editionstatement' => 'Editionstatement',
            'editionresponsibility' => 'Editionresponsibility',
            'timestamp' => 'Timestamp',
            'illus' => 'Illus',
            'pages' => 'Pages',
            'notes' => 'Notes',
            'size' => 'Size',
            'place' => 'Place',
            'lccn' => 'Lccn',
            'url' => 'Url',
            'cn_source' => 'Cn Source',
            'cn_class' => 'Cn Class',
            'cn_item' => 'Cn Item',
            'cn_suffix' => 'Cn Suffix',
            'cn_sort' => 'Cn Sort',
            'agerestriction' => 'Agerestriction',
            'totalissues' => 'Totalissues',
        ];
    }
}
