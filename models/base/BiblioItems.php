<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "biblioitems".
 *
 * @property integer $biblioitemnumber
 * @property integer $biblionumber
 * @property string $volume
 * @property string $number
 * @property string $itemtype
 * @property string $isbn
 * @property string $issn
 * @property string $ean
 * @property string $publicationyear
 * @property string $publishercode
 * @property string $volumedate
 * @property string $volumedesc
 * @property string $collectiontitle
 * @property string $collectionissn
 * @property string $collectionvolume
 * @property string $editionstatement
 * @property string $editionresponsibility
 * @property string $timestamp
 * @property string $illus
 * @property string $pages
 * @property string $notes
 * @property string $size
 * @property string $place
 * @property string $lccn
 * @property string $url
 * @property string $cn_source
 * @property string $cn_class
 * @property string $cn_item
 * @property string $cn_suffix
 * @property string $cn_sort
 * @property string $agerestriction
 * @property integer $totalissues
 *
 * @property \app\models\Biblio $biblionumber0
 * @property \app\models\Items[] $items
 */
class BiblioItems extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'biblionumber0',
            'items'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biblionumber', 'totalissues'], 'integer'],
            [['volume', 'number', 'isbn', 'issn', 'ean', 'publicationyear', 'volumedesc', 'collectiontitle', 'collectionissn', 'collectionvolume', 'editionstatement', 'editionresponsibility', 'notes', 'lccn', 'url'], 'string'],
            [['volumedate', 'timestamp'], 'safe'],
            [['itemtype', 'cn_source', 'cn_item', 'cn_suffix'], 'string', 'max' => 10],
            [['publishercode', 'illus', 'pages', 'size', 'place', 'cn_sort', 'agerestriction'], 'string', 'max' => 255],
            [['cn_class'], 'string', 'max' => 30],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'biblioitems';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiblionumber0()
    {
        return $this->hasOne(\app\models\Biblio::className(), ['biblionumber' => 'biblionumber']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(\app\models\Items::className(), ['biblioitemnumber' => 'biblioitemnumber']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\BiblioItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\BiblioItemsQuery(get_called_class());
    }
}
