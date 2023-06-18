<?php

namespace app\models\payment;

use app\models\db\Cashbox;
use app\models\db\PaymentHistory;

class Payment extends PaymentModel
{
    public function __construct()
    {
        $current_user_cashbox = Cashbox::find()
            ->where(['user_id' => \Yii::$app->user->id])
            ->andWhere(['currency_id' => 1])
            ->one();

        if (!$current_user_cashbox) {
            self::createCashbox();
        }
    }

    /**
     * @return bool
     */
    private static function createCashbox()
    {
        $rand1    = rand(1000, 9999);
        $rand2    = rand(1000, 9999);
        $rand3    = rand(1000, 9999);
        $rand4    = rand(1000, 9999);
        $rand_num = "{$rand1}-{$rand2}-{$rand3}-{$rand4}";

        $cashbox                 = new Cashbox;
        $cashbox->user_id        = \Yii::$app->user->id;
        $cashbox->currency_id    = 1;
        $cashbox->sum            = 1000;
        $cashbox->cashbox_number = $rand_num;
        $cashbox->save();

        return true;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    /**
     * @param $cb_num
     * @param $user_id
     * @param $sum
     *
     * @return bool
     */
    public function send($cb_num, $user_id, $sum)
    {
        // создаем экземпляр лога
        $history = new PaymentHistory;

        // кошелек отправителя
        $cb_from = Cashbox::find()
            ->where(['user_id' => $user_id])
            ->andWhere(['currency_id' => 1])
            ->one();

        // кошелек получателя
        $cb_to = Cashbox::find()
            ->where(['cashbox_number' => $cb_num])
            ->one();

        $history->currency_id = 1;
        $history->sum         = $sum;
        $history->datetime    = time();

        if (!$cb_from) {
            $history->from_user_id = 0;
            $history->status       = 0;
            $history->errcode      = 'Не найден отправитель';
            $history->save();

            return "Нет отправителя";
        } else {
            $history->from_user_id = $cb_from->id;
        }

        if (!$cb_to) {
            $history->to_user_id = 0;
            $history->status     = 0;
            $history->errcode    = 'Не найден получатель';
            $history->save();

            return "Нет получателя";
        } else {
            $history->to_user_id = $cb_to->id;
        }

        // проверяем есть ли у отправителя деньги, которые он пытается перевести
        if ($sum <= $cb_from->sum) {
            // отправляем:
            // минусуем у отправителя
            $cb_from->sum = $cb_from->sum - $sum;
            $cb_from->save();

            // плюсуем у получателя
            $cb_to->sum = $cb_to->sum + $sum;
            $cb_to->save();

            $history->status  = 1;
            $history->errcode = '';
            $history->save();

            var_dump($history);
            exit;

            // подключаем api

            return true;
        } else {
            $history->status  = 0;
            $history->errcode = 'Нет бабланса';
            $history->save();

            return "Нет бабланса";
        }

        return false;
    }

    public function getBalance()
    {
        $current_user_cashbox = Cashbox::find()
            ->where(['user_id' => \Yii::$app->user->id])
            ->andWhere(['currency_id' => 1])
            ->one();

        if ($current_user_cashbox) {
            return $current_user_cashbox->sum;
        }

        return 0;
    }
}