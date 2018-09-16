<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Congviec]].
 *
 * @see Congviec
 */
class CongviecQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Congviec[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Congviec|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
