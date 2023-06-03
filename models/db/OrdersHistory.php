<?php

namespace app\models\db;

/**
 * This is the model class for table "orders_history".
 *
 * @property int    $id
 * @property int    $user_id
 * @property int    $sum
 * @property int    $datetime
 * @property string $order_list
 * @property int    $status
 */
class OrdersHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'user_id',
                    'sum',
                    'datetime',
                    'order_list',
                    'status',
                ],
                'required',
            ],
            [
                [
                    'user_id',
                    'sum',
                    'datetime',
                    'status',
                ],
                'integer',
            ],
            [
                ['order_list'],
                'string',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'user_id'    => 'User ID',
            'sum'        => 'Sum',
            'datetime'   => 'Datetime',
            'order_list' => 'Order List',
            'status'     => 'Status',
        ];
    }
}
