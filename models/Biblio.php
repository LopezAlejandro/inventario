<?php

namespace app\models;

use Yii;
use \app\models\base\Biblio as BaseBiblio;

/**
 * This is the model class for table "biblio".
 */
class Biblio extends BaseBiblio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['author', 'title', 'medium', 'subtitle', 'part_number', 'part_name', 'unititle', 'notes', 'seriestitle', 'abstract'], 'string'],
            [['copyrightdate'], 'integer'],
            [['timestamp', 'datecreated'], 'safe'],
            [['datecreated'], 'required'],
            [['frameworkcode'], 'string', 'max' => 4],
            [['serial'], 'string', 'max' => 1],
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
            'biblionumber' => 'Biblionumber',
            'frameworkcode' => 'Frameworkcode',
            'author' => 'Author',
            'title' => 'Title',
            'medium' => 'Medium',
            'subtitle' => 'Subtitle',
            'part_number' => 'Part Number',
            'part_name' => 'Part Name',
            'unititle' => 'Unititle',
            'notes' => 'Notes',
            'serial' => 'Serial',
            'seriestitle' => 'Seriestitle',
            'copyrightdate' => 'Copyrightdate',
            'timestamp' => 'Timestamp',
            'datecreated' => 'Datecreated',
            'abstract' => 'Abstract',
        ];
    }
}
