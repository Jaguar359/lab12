<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

class TestController extends Controller
{
    public function actionIndex()
    {
        $i = 0;
        $stop = 1;
        while($i < $stop){
            $res = scandir('.');

            echo "\nIter:{$i}\n";
            var_dump($res);
            echo "\n";

            $i++;
        }
    }
}
