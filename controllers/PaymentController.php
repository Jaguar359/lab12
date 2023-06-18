<?php

namespace app\controllers;

use app\models\payment\Payment;
use yii\web\Controller;

class PaymentController extends Controller
{
    public $layout = false;

    public function actionSendMoney()
    {
        $currency = htmlspecialchars($_GET['currency']);
        $sum      = htmlspecialchars($_GET['sum']);
        $cb_num   = htmlspecialchars($_GET['cbnum']);

        var_dump((new Payment())->send($cb_num, \Yii::$app->user->id, $sum));

        return true;
    }
}