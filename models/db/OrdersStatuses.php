<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "orders_statuses".
 *
 * @property int $id
 * @property string $name
 */
class OrdersStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Получение имени статуса по его id
     *
     * @param $id
     *
     * @return mixed|null
     */
    public static function getNameById($id)
    {
        return self::find()->where(['id' => $id])->one()->name;
    }
}
