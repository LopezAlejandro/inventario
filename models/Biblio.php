<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biblio".
 *
 * @property int $biblionumber unique identifier assigned to each bibliographic record
 * @property string $frameworkcode foreign key from the biblio_framework table to identify which framework was used in cataloging this record
 * @property string|null $author statement of responsibility from MARC record (100$a in MARC21)
 * @property string|null $title title (without the subtitle) from the MARC record (245$a in MARC21)
 * @property string|null $medium medium from the MARC record (245$h in MARC21)
 * @property string|null $subtitle remainder of the title from the MARC record (245$b in MARC21)
 * @property string|null $part_number part number from the MARC record (245$n in MARC21)
 * @property string|null $part_name part name from the MARC record (245$p in MARC21)
 * @property string|null $unititle uniform title (without the subtitle) from the MARC record (240$a in MARC21)
 * @property string|null $notes values from the general notes field in the MARC record (500$a in MARC21) split by bar (|)
 * @property int|null $serial Boolean indicating whether biblio is for a serial
 * @property string|null $seriestitle
 * @property int|null $copyrightdate publication or copyright date from the MARC record
 * @property string $timestamp date and time this record was last touched
 * @property string $datecreated the date this record was added to Koha
 * @property string|null $abstract summary from the MARC record (520$a in MARC21)
 *
 * @property BiblioMetadatum[] $biblioMetadata
 * @property Biblioitem[] $biblioitems
 * @property Item[] $items
 */
class Biblio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biblio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author', 'title', 'medium', 'subtitle', 'part_number', 'part_name', 'unititle', 'notes', 'seriestitle', 'abstract'], 'string'],
            [['serial', 'copyrightdate'], 'integer'],
            [['timestamp', 'datecreated'], 'safe'],
            [['datecreated'], 'required'],
            [['frameworkcode'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'biblionumber' => 'unique identifier assigned to each bibliographic record',
            'frameworkcode' => 'foreign key from the biblio_framework table to identify which framework was used in cataloging this record',
            'author' => 'statement of responsibility from MARC record (100$a in MARC21)',
            'title' => 'title (without the subtitle) from the MARC record (245$a in MARC21)',
            'medium' => 'medium from the MARC record (245$h in MARC21)',
            'subtitle' => 'remainder of the title from the MARC record (245$b in MARC21)',
            'part_number' => 'part number from the MARC record (245$n in MARC21)',
            'part_name' => 'part name from the MARC record (245$p in MARC21)',
            'unititle' => 'uniform title (without the subtitle) from the MARC record (240$a in MARC21)',
            'notes' => 'values from the general notes field in the MARC record (500$a in MARC21) split by bar (|)',
            'serial' => 'Boolean indicating whether biblio is for a serial',
            'seriestitle' => 'Seriestitle',
            'copyrightdate' => 'publication or copyright date from the MARC record',
            'timestamp' => 'date and time this record was last touched',
            'datecreated' => 'the date this record was added to Koha',
            'abstract' => 'summary from the MARC record (520$a in MARC21)',
        ];
    }

    /**
     * Gets query for [[BiblioMetadata]].
     *
     * @return \yii\db\ActiveQuery|BiblioMetadatumQuery
     */
    public function getBiblioMetadata()
    {
        return $this->hasMany(BiblioMetadatum::class, ['biblionumber' => 'biblionumber']);
    }

    /**
     * Gets query for [[Biblioitems]].
     *
     * @return \yii\db\ActiveQuery|BiblioitemQuery
     */
    public function getBiblioitems()
    {
        return $this->hasMany(Biblioitem::class, ['biblionumber' => 'biblionumber']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery|ItemQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::class, ['biblionumber' => 'biblionumber']);
    }

    /**
     * {@inheritdoc}
     * @return BiblioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BiblioQuery(get_called_class());
    }
}
