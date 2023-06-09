<?php

namespace app\controllers;

use app\models\db\OrdersHistory;
use app\models\payment\Payment;
use app\models\User;
use Yii;
use yii\web\Controller;

class LkController extends Controller
{
    public $layout = 'user-lk';

    public function beforeAction($action)
    {
        $payment = new Payment;

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMyOrders()
    {
        $my_orders = OrdersHistory::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->asArray()
            ->all();

        return $this->render('my-orders', [
            'my_orders' => $my_orders,
        ]);
    }

    public function actionSettings()
    {
        // 1. находим юзера
        $model = User::find()->where(['id' => Yii::$app->user->id])->one();

        // 2. если прошла отправка формы - обрабатываем
        if ($model->load(Yii::$app->request->post())) {
            // 3. что-то меняем

            // 4. сохраняем
            $model->save();

            // 5. редиректим
            return $this->redirect(['lk/settings']);
        }

        // 2.2 если не было отправки формы - отрисовываем страницу настроек
        return $this->render('settings', [
            'model' => $model,
        ]);
    }
}