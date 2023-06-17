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
     * @param $from
     * @param $user_id
     *
     * @return mixed
     */
    abstract public function send($from, $user_id);
}