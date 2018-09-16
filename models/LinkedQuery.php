<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Linked]].
 *
 * @see Linked
 */
class LinkedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Linked[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Linked|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
