<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "cashbox".
 *
 * @property int $id
 * @property int $user_id
 * @property int $currency_id
 * @property int $sum
 * @property string $cashbox_number
 */
class Cashbox extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cashbox';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'currency_id', 'sum', 'cashbox_number'], 'required'],
            [['user_id', 'currency_id', 'sum'], 'integer'],
            [['cashbox_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'currency_id' => 'Currency ID',
            'sum' => 'Sum',
            'cashbox_number' => 'Cashbox Number',
        ];
    }
}
