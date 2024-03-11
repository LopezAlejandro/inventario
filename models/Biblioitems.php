<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biblioitems".
 *
 * @property int $biblioitemnumber primary key, unique identifier assigned by Koha
 * @property int $biblionumber foreign key linking this table to the biblio table
 * @property string|null $volume
 * @property string|null $number
 * @property string|null $itemtype biblio level item type (MARC21 942$c)
 * @property string|null $isbn ISBN (MARC21 020$a)
 * @property string|null $issn ISSN (MARC21 022$a)
 * @property string|null $ean
 * @property string|null $publicationyear
 * @property string|null $publishercode publisher (MARC21 260$b)
 * @property string|null $volumedate
 * @property string|null $volumedesc volume information (MARC21 362$a)
 * @property string|null $collectiontitle
 * @property string|null $collectionissn
 * @property string|null $collectionvolume
 * @property string|null $editionstatement
 * @property string|null $editionresponsibility
 * @property string $timestamp
 * @property string|null $illus illustrations (MARC21 300$b)
 * @property string|null $pages number of pages (MARC21 300$c)
 * @property string|null $notes
 * @property string|null $size material size (MARC21 300$c)
 * @property string|null $place publication place (MARC21 260$a)
 * @property string|null $lccn library of congress control number (MARC21 010$a)
 * @property string|null $url url (MARC21 856$u)
 * @property string|null $cn_source classification source (MARC21 942$2)
 * @property string|null $cn_class
 * @property string|null $cn_item
 * @property string|null $cn_suffix
 * @property string|null $cn_sort normalized version of the call number used for sorting
 * @property string|null $agerestriction target audience/age restriction from the bib record (MARC21 521$a)
 * @property int|null $totalissues
 *
 * @property Biblio $biblionumber0
 * @property Item[] $items
 */
class Biblioitems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biblioitems';
    }

    /**
     * {@inheritdoc}
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
            [['biblionumber'], 'exist', 'skipOnError' => true, 'targetClass' => Biblio::class, 'targetAttribute' => ['biblionumber' => 'biblionumber']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'biblioitemnumber' => 'primary key, unique identifier assigned by Koha',
            'biblionumber' => 'foreign key linking this table to the biblio table',
            'volume' => 'Volume',
            'number' => 'Number',
            'itemtype' => 'biblio level item type (MARC21 942$c)',
            'isbn' => 'ISBN (MARC21 020$a)',
            'issn' => 'ISSN (MARC21 022$a)',
            'ean' => 'Ean',
            'publicationyear' => 'Publicationyear',
            'publishercode' => 'publisher (MARC21 260$b)',
            'volumedate' => 'Volumedate',
            'volumedesc' => 'volume information (MARC21 362$a)',
            'collectiontitle' => 'Collectiontitle',
            'collectionissn' => 'Collectionissn',
            'collectionvolume' => 'Collectionvolume',
            'editionstatement' => 'Editionstatement',
            'editionresponsibility' => 'Editionresponsibility',
            'timestamp' => 'Timestamp',
            'illus' => 'illustrations (MARC21 300$b)',
            'pages' => 'number of pages (MARC21 300$c)',
            'notes' => 'Notes',
            'size' => 'material size (MARC21 300$c)',
            'place' => 'publication place (MARC21 260$a)',
            'lccn' => 'library of congress control number (MARC21 010$a)',
            'url' => 'url (MARC21 856$u)',
            'cn_source' => 'classification source (MARC21 942$2)',
            'cn_class' => 'Cn Class',
            'cn_item' => 'Cn Item',
            'cn_suffix' => 'Cn Suffix',
            'cn_sort' => 'normalized version of the call number used for sorting',
            'agerestriction' => 'target audience/age restriction from the bib record (MARC21 521$a)',
            'totalissues' => 'Totalissues',
        ];
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
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery|ItemQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::class, ['biblioitemnumber' => 'biblioitemnumber']);
    }

    /**
     * {@inheritdoc}
     * @return BiblioitemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BiblioitemsQuery(get_called_class());
    }
}
