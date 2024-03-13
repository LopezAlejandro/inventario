<?php

namespace app\models;

use Yii;
use \app\models\base\Items as BaseItems;

/**
 * This is the model class for table "items".
 */
class Items extends BaseItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['biblionumber', 'biblioitemnumber', 'issues', 'renewals', 'reserves'], 'integer'],
            [['dateaccessioned', 'replacementpricedate', 'datelastborrowed', 'datelastseen', 'damaged_on', 'itemlost_on', 'withdrawn_on', 'timestamp', 'deleted_on', 'onloan'], 'safe'],
            [['booksellerid', 'itemnotes', 'itemnotes_nonpublic', 'materials', 'uri', 'more_subfields_xml', 'enumchron'], 'string'],
            [['price', 'replacementprice'], 'number'],
            [['barcode'], 'string', 'max' => 20],
            [['homebranch', 'coded_location_qualifier', 'holdingbranch', 'cn_source', 'itype'], 'string', 'max' => 10],
            [['stack', 'notforloan', 'damaged', 'itemlost', 'withdrawn', 'restricted', 'exclude_from_local_holds_priority'], 'string', 'max' => 1],
            [['itemcallnumber', 'cn_sort'], 'string', 'max' => 255],
            [['location', 'permanent_location', 'ccode'], 'string', 'max' => 80],
            [['copynumber', 'stocknumber', 'new_status'], 'string', 'max' => 32],
            [['barcode'], 'unique'],
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
            'itemnumber' => 'Itemnumber',
            'biblionumber' => 'Biblionumber',
            'biblioitemnumber' => 'Biblioitemnumber',
            'barcode' => 'Barcode',
            'dateaccessioned' => 'Dateaccessioned',
            'booksellerid' => 'Booksellerid',
            'homebranch' => 'Homebranch',
            'price' => 'Price',
            'replacementprice' => 'Replacementprice',
            'replacementpricedate' => 'Replacementpricedate',
            'datelastborrowed' => 'Datelastborrowed',
            'datelastseen' => 'Datelastseen',
            'stack' => 'Stack',
            'notforloan' => 'Notforloan',
            'damaged' => 'Damaged',
            'damaged_on' => 'Damaged On',
            'itemlost' => 'Itemlost',
            'itemlost_on' => 'Itemlost On',
            'withdrawn' => 'Withdrawn',
            'withdrawn_on' => 'Withdrawn On',
            'itemcallnumber' => 'Itemcallnumber',
            'coded_location_qualifier' => 'Coded Location Qualifier',
            'issues' => 'Issues',
            'renewals' => 'Renewals',
            'reserves' => 'Reserves',
            'restricted' => 'Restricted',
            'itemnotes' => 'Itemnotes',
            'itemnotes_nonpublic' => 'Itemnotes Nonpublic',
            'holdingbranch' => 'Holdingbranch',
            'timestamp' => 'Timestamp',
            'deleted_on' => 'Deleted On',
            'location' => 'Location',
            'permanent_location' => 'Permanent Location',
            'onloan' => 'Onloan',
            'cn_source' => 'Cn Source',
            'cn_sort' => 'Cn Sort',
            'ccode' => 'Ccode',
            'materials' => 'Materials',
            'uri' => 'Uri',
            'itype' => 'Itype',
            'more_subfields_xml' => 'More Subfields Xml',
            'enumchron' => 'Enumchron',
            'copynumber' => 'Copynumber',
            'stocknumber' => 'Stocknumber',
            'new_status' => 'New Status',
            'exclude_from_local_holds_priority' => 'Exclude From Local Holds Priority',
        ];
    }
}
