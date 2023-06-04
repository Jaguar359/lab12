<?php

namespace app\controllers;

use app\models\db\Products;
use yii\web\Controller;

class NewController extends Controller
{
    public $layout = 'default';

    public function actionIndex()
    {
        return $this->render('index');
    }
}