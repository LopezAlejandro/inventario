<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Biblioitems]].
 *
 * @see Biblioitems
 */
class BiblioitemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Biblioitems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Biblioitems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
