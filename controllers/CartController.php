<?php

namespace app\controllers;

use app\models\Cart;
use app\models\db\OrdersHistory;
use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public $layout = false;

    public function actionIndex()
    {
        $this->layout = 'cart';

        return $this->render('index');
    }

    public function actionSendOrder()
    {
        // подготавливаем переменные
        $cart       = $_SESSION["cart"];
        $result_sum = 0;
        $result_qty = 0;

        // суммируем кол-во и сумму
        foreach ($cart as $item) {
            $result_qty += $item['qty'];
            $result_sum += $item['price'];
        }

        // подготавливаем массив для базы
        $order             = new OrdersHistory;
        $order->user_id    = Yii::$app->user->id;
        $order->sum        = $result_sum;
        $order->datetime   = time();
        $order->order_list = serialize($cart);
        $order->status     = 1;

        // сохраняем
        if ($order->save()) {
            echo 'все ок';
        };
    }

    public function actionAdd()
    {
        $id = htmlspecialchars($_GET['id']);
        Cart::add($id);

        return true;
    }

    public function actionGetQty()
    {
        //var_dump(Cart::getQty());
        return Cart::getQty();
    }

    public function actionDelete()
    {
        $id = htmlspecialchars($_GET['id']);
        Cart::delete($id);

        return true;
    }

    public function actionChangeQty()
    {
        $id  = htmlspecialchars($_GET['id']);
        $qty = htmlspecialchars($_GET['val']);

        Cart::changeQty($id, $qty);

        return $this->render('cart-table');
    }
}