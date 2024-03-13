<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BiblioItems]].
 *
 * @see BiblioItems
 */
class BiblioItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BiblioItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BiblioItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
