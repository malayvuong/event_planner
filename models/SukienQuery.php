<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sukien]].
 *
 * @see Sukien
 */
class SukienQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Sukien[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Sukien|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
