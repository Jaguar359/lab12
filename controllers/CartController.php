<?php

namespace app\controllers;

use app\models\Cart;
use app\models\db\OrdersHistory;
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
        // если существует $_SESSION['cart'] и она является массивом:
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            // сформировать заказ
            $sum      = 0;
            $products = $_SESSION['cart'];

            foreach ($products as $product) {
                $sum += $product['price'] * $product['qty'];
            }

            if (\Yii::$app->user->isGuest) {
                $user_id = 0;
            } else {
                $user_id     = \Yii::$app->user->id;
                $client_mail = \Yii::$app->user->identity->email;
                $client_name = \Yii::$app->user->identity->username;
            }

            // сохранить заказ
            $order_num_date = date('dm');
            $order_num_rand = rand(1000, 9999);

            $new_order             = new OrdersHistory;
            $new_order->user_id    = $user_id;
            $new_order->sum        = $sum;
            $new_order->datetime   = time();
            $new_order->order_list = serialize($products);
            $new_order->status     = 1;
            $new_order->order_num  = "{$order_num_date}-{$order_num_rand}";
            $new_order->save();

            // отправить письмо клиенту
            if ($user_id != 0) {
                //self::sendMailToClient($client_name, $client_mail, serialize($products));
            }

            // отправить письмо админу
            //self::sendMailToAdmin(serialize($products));

            // чистим корзину
            unset($_SESSION['cart']);

            return $this->render('send-order');
        }
    }

    private static function sendMailToAdmin($serialized_products)
    {
        $message = "С магазина пришел заказ\n{$serialized_products}";

        mail("admin@mail.ru", "Заказ с сайта", $message);
    }

    private static function sendMailToClient($client_name, $client_mail, $serialized_products)
    {
        $message = "Вы заказали \n{$serialized_products}";

        mail($client_mail, "Заказ с сайта", $message);
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