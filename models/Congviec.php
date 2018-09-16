<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "congviec".
 *
 * @property int $cv_id
 * @property string $cv_name Tên công việc
 */
class Congviec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congviec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cv_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cv_id' => 'Cv ID',
            'cv_name' => 'Tên công việc',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CongviecQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CongviecQuery(get_called_class());
    }
}
