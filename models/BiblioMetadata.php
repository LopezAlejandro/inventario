<?php

namespace app\models;

use Yii;
use \app\models\base\BiblioMetadata as BaseBiblioMetadata;

/**
 * This is the model class for table "biblio_metadata".
 */
class BiblioMetadata extends BaseBiblioMetadata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['biblionumber', 'format', 'schema', 'metadata'], 'required'],
            [['biblionumber'], 'integer'],
            [['metadata'], 'string'],
            [['timestamp'], 'safe'],
            [['format', 'schema'], 'string', 'max' => 16],
            [['biblionumber', 'format', 'schema'], 'unique', 'targetAttribute' => ['biblionumber', 'format', 'schema'], 'message' => 'The combination of Biblionumber, Format and Schema has already been taken.'],
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
            'id' => 'ID',
            'biblionumber' => 'Biblionumber',
            'format' => 'Format',
            'schema' => 'Schema',
            'metadata' => 'Metadata',
            'timestamp' => 'Timestamp',
        ];
    }
}
