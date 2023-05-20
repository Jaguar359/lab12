<?php

namespace app\controllers;

use app\models\db\Products;
use yii\web\Controller;

class CartController extends Controller
{
    public $layout = false;

    public function actionAdd()
    {
        $id = htmlspecialchars($_GET['id']);
        /** @var Products $product */
        $product = Products::find()->where(['id' => $id])->one();

        if (!isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id] = [
                'title' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'qty'   => 1,
            ];
        } else {
            $_SESSION['cart'][$id] = [
                'title' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'qty'   => $_SESSION['cart'][$id]['qty'] + 1,
            ];
        }

        return true;
    }

    public function actionGetQty()
    {
        return 10;
    }
}