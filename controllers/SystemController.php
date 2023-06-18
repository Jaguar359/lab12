<?php

namespace app\controllers;

use app\models\CheckImages;
use app\models\db\Notification;
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

    public function actionCheckNotification()
    {
        $user_id = \Yii::$app->user->id;

        $all_user_notification = Notification::find()
            ->where(['user_id' => $user_id])
            ->asArray()
            ->all();

        foreach ($all_user_notification as $cr_notif){
            $cr_notif_in_db = Notification::find()->where(['id' => $cr_notif['id']])->one();
            $cr_notif_in_db->actual = 0;
            $cr_notif_in_db->save();
        }

        return true;
    }
}