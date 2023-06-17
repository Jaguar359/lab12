<?php

namespace app\models\payment;

use app\models\db\Cashbox;

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
     * @param $from
     * @param $user_id
     *
     * @return bool
     */
    public function send($from, $user_id)
    {
        return true;
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