<?php

namespace app\controllers;

use app\models\Cart;
use app\models\db\Products;
use yii\web\Controller;

class CartController extends Controller
{
    public $layout = false;

    public function actionAdd()
    {
        $id = htmlspecialchars($_GET['id']);
        var_dump(Cart::add($id));

        return true;
    }

    public function actionGetQty()
    {
        //var_dump(Cart::getQty());
        return Cart::getQty();
    }
}