<?php

namespace app\controllers;

use app\models\CheckImages;
use yii\web\Controller;

class SystemController extends Controller
{
    public $layout = false;

    public function actionIndex()
    {
        echo '<pre>';
        var_dump(scandir('../../../../mail'));
    }

    public function actionCheckImages()
    {
        (new CheckImages())->start();
    }
}