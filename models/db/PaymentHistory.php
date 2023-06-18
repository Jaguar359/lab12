<?php

namespace app\models\db;

/**
 * This is the model class for table "payment_history".
 *
 * @property int         $id
 * @property int         $from_user_id
 * @property int         $to_user_id
 * @property int         $currency_id
 * @property int         $sum
 * @property int         $datetime
 * @property int         $status
 * @property string|null $errcode
 */
class PaymentHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'from_user_id',
                    'to_user_id',
                    'currency_id',
                    'sum',
                    'datetime',
                    'status',
                ],
                'required',
            ],
            [
                [
                    'from_user_id',
                    'to_user_id',
                    'currency_id',
                    'sum',
                    'datetime',
                    'status',
                ],
                'integer',
            ],
            [
                ['errcode'],
                'string',
                'max' => 255,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'from_user_id' => 'From User ID',
            'to_user_id'   => 'To User ID',
            'currency_id'  => 'Currency ID',
            'sum'          => 'Sum',
            'datetime'     => 'Datetime',
            'status'       => 'Status',
            'errcode'      => 'Errcode',
        ];
    }
}
