<?php

namespace app\controllers;

use app\models\db\Notification;
use app\models\db\Products;
use yii\web\Controller;

class TestController extends Controller
{
    public $layout = false;

    public function actionIndex()
    {
        (new Notification())->set('8', 'site', 'Проверка оповещений', 'Сообщение оповещения на сайте');
    }
}
