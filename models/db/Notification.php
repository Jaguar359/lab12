<?php

namespace app\models\db;

/**
 * This is the model class for table "notification".
 *
 * @property int    $id
 * @property int    $user_id
 * @property int    $actual
 * @property string $notif_type
 * @property string $theme
 * @property string $message
 * @property int    $datetime
 * @property int    $sended
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
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
                    'actual',
                    'notif_type',
                    'theme',
                    'message',
                    'datetime',
                    'sended',
                ],
                'required',
            ],
            [
                [
                    'user_id',
                    'actual',
                    'datetime',
                    'sended',
                ],
                'integer',
            ],
            [
                ['message'],
                'string',
            ],
            [
                [
                    'notif_type',
                    'theme',
                ],
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
            'id'         => 'ID',
            'user_id'    => 'User ID',
            'actual'     => 'Actual',
            'notif_type' => 'Notif Type',
            'theme'      => 'Theme',
            'message'    => 'Message',
            'datetime'   => 'Datetime',
            'sended'     => 'Sended',
        ];
    }

    /**
     * Установить новое уведомление
     * (только сохранение в бд, не фактическая обработка)
     *
     * @param $user_id
     * @param $notif_type
     * @param $theme
     * @param $message
     */
    public function set($user_id, $notif_type, $theme, $message)
    {
        $new_notif             = new Notification;
        $new_notif->user_id    = $user_id;
        $new_notif->actual     = 1;
        $new_notif->notif_type = $notif_type; // site || email || sms
        $new_notif->theme      = $theme;
        $new_notif->message    = $message;
        $new_notif->datetime   = time();
        $new_notif->sended     = 0;
        $new_notif->save();
    }

    public function send()
    {
        // найти актуальные и не отправленные оповещения
        $actual_notifs = self::find()
            ->where(['actual' => 1])
            ->andWhere(['sended' => 0])
            ->asArray()
            ->all();

        // в зависимости от типа оповещения - обработать его
        foreach ($actual_notifs as $current_notification) {
            if ($current_notification['notif_type'] == 'site') {
                // сайт
                // отправить оповещение
                // поменять его в бд
                $cr_notif_in_bd = self::find()->where(['id' => $current_notification['id']])->one();
                // определяемся, как именно его меняем
                $cr_notif_in_bd->save();

            } elseif ($current_notification['notif_type'] == 'email') {
                // e-mail
            } elseif ($current_notification['notif_type'] == 'sms') {
                // sms
            } else {
                return "Не верный тип оповещения";
            }
        }
    }
}
