<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BiblioMetadata]].
 *
 * @see BiblioMetadata
 */
class BiblioMetadataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BiblioMetadata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BiblioMetadata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
