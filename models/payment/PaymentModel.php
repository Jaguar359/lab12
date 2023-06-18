<?php

namespace app\models\payment;

abstract class PaymentModel
{
    /**
     * Проверка платежа
     *
     * @return mixed
     */
    abstract public function validate();

    /**
     * Отправка платежа
     *
     * @param $cb_num
     * @param $user_id
     * @param $sum
     *
     * @return mixed
     */
    abstract public function send($cb_num, $user_id, $sum);
}