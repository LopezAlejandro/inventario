<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $itemnumber primary key and unique identifier added by Koha
 * @property int $biblionumber foreign key from biblio table used to link this item to the right bib record
 * @property int $biblioitemnumber foreign key from the biblioitems table to link to item to additional information
 * @property string|null $barcode item barcode (MARC21 952$p)
 * @property string|null $dateaccessioned date the item was acquired or added to Koha (MARC21 952$d)
 * @property string|null $booksellerid where the item was purchased (MARC21 952$e)
 * @property string|null $homebranch foreign key from the branches table for the library that owns this item (MARC21 952$a)
 * @property float|null $price purchase price (MARC21 952$g)
 * @property float|null $replacementprice cost the library charges to replace the item if it has been marked lost (MARC21 952$v)
 * @property string|null $replacementpricedate the date the price is effective from (MARC21 952$w)
 * @property string|null $datelastborrowed the date the item was last checked out/issued
 * @property string|null $datelastseen the date the item was last see (usually the last time the barcode was scanned or inventory was done)
 * @property int|null $stack
 * @property int $notforloan authorized value defining why this item is not for loan (MARC21 952$7)
 * @property int $damaged authorized value defining this item as damaged (MARC21 952$4)
 * @property string|null $damaged_on the date and time an item was last marked as damaged, NULL if not damaged
 * @property int $itemlost authorized value defining this item as lost (MARC21 952$1)
 * @property string|null $itemlost_on the date and time an item was last marked as lost, NULL if not lost
 * @property int $withdrawn authorized value defining this item as withdrawn (MARC21 952$0)
 * @property string|null $withdrawn_on the date and time an item was last marked as withdrawn, NULL if not withdrawn
 * @property string|null $itemcallnumber call number for this item (MARC21 952$o)
 * @property string|null $coded_location_qualifier coded location qualifier(MARC21 952$f)
 * @property int|null $issues number of times this item has been checked out/issued
 * @property int|null $renewals number of times this item has been renewed
 * @property int|null $reserves number of times this item has been placed on hold/reserved
 * @property int|null $restricted authorized value defining use restrictions for this item (MARC21 952$5)
 * @property string|null $itemnotes public notes on this item (MARC21 952$z)
 * @property string|null $itemnotes_nonpublic non-public notes on this item (MARC21 952$x)
 * @property string|null $holdingbranch foreign key from the branches table for the library that is currently in possession item (MARC21 952$b)
 * @property string $timestamp date and time this item was last altered
 * @property string|null $deleted_on date/time of deletion
 * @property string|null $location authorized value for the shelving location for this item (MARC21 952$c)
 * @property string|null $permanent_location linked to the CART and PROC temporary locations feature, stores the permanent shelving location
 * @property string|null $onloan defines if item is checked out (NULL for not checked out, and due date for checked out)
 * @property string|null $cn_source classification source used on this item (MARC21 952$2)
 * @property string|null $cn_sort normalized form of the call number (MARC21 952$o) used for sorting
 * @property string|null $ccode authorized value for the collection code associated with this item (MARC21 952$8)
 * @property string|null $materials materials specified (MARC21 952$3)
 * @property string|null $uri URL for the item (MARC21 952$u)
 * @property string|null $itype foreign key from the itemtypes table defining the type for this item (MARC21 952$y)
 * @property string|null $more_subfields_xml additional 952 subfields in XML format
 * @property string|null $enumchron serial enumeration/chronology for the item (MARC21 952$h)
 * @property string|null $copynumber copy number (MARC21 952$t)
 * @property string|null $stocknumber inventory number (MARC21 952$i)
 * @property string|null $new_status 'new' value, you can put whatever free-text information. This field is intented to be managed by the automatic_item_modification_by_age cronjob.
 * @property int|null $exclude_from_local_holds_priority Exclude this item from local holds priority
 *
 * @property Biblioitems $biblioitemnumber0
 * @property Biblio $biblionumber0
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biblionumber', 'biblioitemnumber', 'stack', 'notforloan', 'damaged', 'itemlost', 'withdrawn', 'issues', 'renewals', 'reserves', 'restricted', 'exclude_from_local_holds_priority'], 'integer'],
            [['dateaccessioned', 'replacementpricedate', 'datelastborrowed', 'datelastseen', 'damaged_on', 'itemlost_on', 'withdrawn_on', 'timestamp', 'deleted_on', 'onloan'], 'safe'],
            [['booksellerid', 'itemnotes', 'itemnotes_nonpublic', 'materials', 'uri', 'more_subfields_xml', 'enumchron'], 'string'],
            [['price', 'replacementprice'], 'number'],
            [['barcode'], 'string', 'max' => 20],
            [['homebranch', 'coded_location_qualifier', 'holdingbranch', 'cn_source', 'itype'], 'string', 'max' => 10],
            [['itemcallnumber', 'cn_sort'], 'string', 'max' => 255],
            [['location', 'permanent_location', 'ccode'], 'string', 'max' => 80],
            [['copynumber', 'stocknumber', 'new_status'], 'string', 'max' => 32],
            [['barcode'], 'unique'],
            [['biblioitemnumber'], 'exist', 'skipOnError' => true, 'targetClass' => Biblioitems::class, 'targetAttribute' => ['biblioitemnumber' => 'biblioitemnumber']],
            [['biblionumber'], 'exist', 'skipOnError' => true, 'targetClass' => Biblio::class, 'targetAttribute' => ['biblionumber' => 'biblionumber']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'itemnumber' => 'primary key and unique identifier added by Koha',
            'biblionumber' => 'foreign key from biblio table used to link this item to the right bib record',
            'biblioitemnumber' => 'foreign key from the biblioitems table to link to item to additional information',
            'barcode' => 'item barcode (MARC21 952$p)',
            'dateaccessioned' => 'date the item was acquired or added to Koha (MARC21 952$d)',
            'booksellerid' => 'where the item was purchased (MARC21 952$e)',
            'homebranch' => 'foreign key from the branches table for the library that owns this item (MARC21 952$a)',
            'price' => 'purchase price (MARC21 952$g)',
            'replacementprice' => 'cost the library charges to replace the item if it has been marked lost (MARC21 952$v)',
            'replacementpricedate' => 'the date the price is effective from (MARC21 952$w)',
            'datelastborrowed' => 'the date the item was last checked out/issued',
            'datelastseen' => 'the date the item was last see (usually the last time the barcode was scanned or inventory was done)',
            'stack' => 'Stack',
            'notforloan' => 'authorized value defining why this item is not for loan (MARC21 952$7)',
            'damaged' => 'authorized value defining this item as damaged (MARC21 952$4)',
            'damaged_on' => 'the date and time an item was last marked as damaged, NULL if not damaged',
            'itemlost' => 'authorized value defining this item as lost (MARC21 952$1)',
            'itemlost_on' => 'the date and time an item was last marked as lost, NULL if not lost',
            'withdrawn' => 'authorized value defining this item as withdrawn (MARC21 952$0)',
            'withdrawn_on' => 'the date and time an item was last marked as withdrawn, NULL if not withdrawn',
            'itemcallnumber' => 'call number for this item (MARC21 952$o)',
            'coded_location_qualifier' => 'coded location qualifier(MARC21 952$f)',
            'issues' => 'number of times this item has been checked out/issued',
            'renewals' => 'number of times this item has been renewed',
            'reserves' => 'number of times this item has been placed on hold/reserved',
            'restricted' => 'authorized value defining use restrictions for this item (MARC21 952$5)',
            'itemnotes' => 'public notes on this item (MARC21 952$z)',
            'itemnotes_nonpublic' => 'non-public notes on this item (MARC21 952$x)',
            'holdingbranch' => 'foreign key from the branches table for the library that is currently in possession item (MARC21 952$b)',
            'timestamp' => 'date and time this item was last altered',
            'deleted_on' => 'date/time of deletion',
            'location' => 'authorized value for the shelving location for this item (MARC21 952$c)',
            'permanent_location' => 'linked to the CART and PROC temporary locations feature, stores the permanent shelving location',
            'onloan' => 'defines if item is checked out (NULL for not checked out, and due date for checked out)',
            'cn_source' => 'classification source used on this item (MARC21 952$2)',
            'cn_sort' => 'normalized form of the call number (MARC21 952$o) used for sorting',
            'ccode' => 'authorized value for the collection code associated with this item (MARC21 952$8)',
            'materials' => 'materials specified (MARC21 952$3)',
            'uri' => 'URL for the item (MARC21 952$u)',
            'itype' => 'foreign key from the itemtypes table defining the type for this item (MARC21 952$y)',
            'more_subfields_xml' => 'additional 952 subfields in XML format',
            'enumchron' => 'serial enumeration/chronology for the item (MARC21 952$h)',
            'copynumber' => 'copy number (MARC21 952$t)',
            'stocknumber' => 'inventory number (MARC21 952$i)',
            'new_status' => '\'new\' value, you can put whatever free-text information. This field is intented to be managed by the automatic_item_modification_by_age cronjob.',
            'exclude_from_local_holds_priority' => 'Exclude this item from local holds priority',
        ];
    }

    /**
     * Gets query for [[Biblioitemnumber0]].
     *
     * @return \yii\db\ActiveQuery|BiblioitemsQuery
     */
    public function getBiblioitemnumber0()
    {
        return $this->hasOne(Biblioitems::class, ['biblioitemnumber' => 'biblioitemnumber']);
    }

    /**
     * Gets query for [[Biblionumber0]].
     *
     * @return \yii\db\ActiveQuery|BiblioQuery
     */
    public function getBiblionumber0()
    {
        return $this->hasOne(Biblio::class, ['biblionumber' => 'biblionumber']);
    }

    /**
     * {@inheritdoc}
     * @return ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemsQuery(get_called_class());
    }
}
