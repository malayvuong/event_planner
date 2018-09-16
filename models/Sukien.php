<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sukien".
 *
 * @property int $sk_id
 * @property string $sk_name Tên sự kiện
 * @property string $sk_khuvuc Khu vực
 * @property string $sk_time Thời gian
 * @property string $sk_begin Thời gian bắt đầu
 * @property string $sk_end Thời gian kết thúc
 * @property string $sk_address Địa chỉ
 * @property string $sk_note Ghi chú
 * @property int $sk_status Trạng thái
 */
class Sukien extends \yii\db\ActiveRecord
{
    private $sk_id;
    private $sk_name;
    private $sk_khuvuc;
    private $sk_address;
    private $sk_note;
    private $sk_time;
    private $sk_begin;
    private $sk_end;
    private $sk_view;
    private $sk_status;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sukien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sk_name', 'sk_khuvuc', 'sk_address', 'sk_note'], 'required'],
            [['sk_time', 'sk_begin', 'sk_end'], 'safe'],
            [['sk_note'], 'string'],
            [['sk_status'], 'integer'],
            [['sk_name', 'sk_khuvuc'], 'string', 'max' => 100],
            [['sk_address'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sk_id' => 'Sk ID',
            'sk_name' => 'Tên sự kiện',
            'sk_khuvuc' => 'Khu vực',
            'sk_time' => 'Thời gian',
            'sk_begin' => 'Thời gian bắt đầu',
            'sk_end' => 'Thời gian kết thúc',
            'sk_address' => 'Địa chỉ',
            'sk_note' => 'Ghi chú',
            'sk_status' => 'Trạng thái',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SukienQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SukienQuery(get_called_class());
    }
}
