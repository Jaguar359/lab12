<?php
namespace app\commands;

use app\models\CheckImages;
use yii\console\Controller;

/**
 * Системные скрипты
 * @package app\commands
 */
class SystemController extends Controller
{
    /**
     * Очистка лишних картинок
     *
     * @return bool
     */
    public function actionCheckImages(): bool
    {
        (new CheckImages())->start();

        return true;
    }
}
