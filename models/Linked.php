<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linked".
 *
 * @property int $lid
 * @property int $sk_id Mã sự kiện
 * @property int $user Mã user
 * @property int $cv_id Mã công việc
 * @property string $begin Bắt đầu
 * @property string $end Kết thúc
 * @property string $klcv Khối lượng
 * @property int $status Trạng thái
 *
 * @property Users $user0
 * @property Congviec $cv
 * @property Sukien $sk
 */
class Linked extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linked';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sk_id', 'user', 'cv_id', 'status'], 'integer'],
            [['begin', 'end'], 'safe'],
            [['klcv'], 'string', 'max' => 500],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user' => 'id']],
            [['cv_id'], 'exist', 'skipOnError' => true, 'targetClass' => Congviec::className(), 'targetAttribute' => ['cv_id' => 'cv_id']],
            [['sk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sukien::className(), 'targetAttribute' => ['sk_id' => 'sk_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lid' => 'Lid',
            'sk_id' => 'Mã sự kiện',
            'user' => 'Mã user',
            'cv_id' => 'Mã công việc',
            'begin' => 'Bắt đầu',
            'end' => 'Kết thúc',
            'klcv' => 'Khối lượng công việc (giới hạn 500 ký tự)',
            'status' => 'Trạng thái',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(Users::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCv()
    {
        return $this->hasOne(Congviec::className(), ['cv_id' => 'cv_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSk()
    {
        return $this->hasOne(Sukien::className(), ['sk_id' => 'sk_id']);
    }

    /**
     * {@inheritdoc}
     * @return LinkedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LinkedQuery(get_called_class());
    }
}
