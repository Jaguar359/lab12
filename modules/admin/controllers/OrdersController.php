<?php

namespace app\modules\admin\controllers;

use app\models\db\OrdersHistory;
use yii\web\Controller;

class OrdersController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $orders = OrdersHistory::find()->asArray()->all();

        return $this->render('index', [
            'orders' => $orders,
        ]);
    }
}