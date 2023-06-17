<?php

namespace app\controllers;

use app\models\db\Products;
use yii\web\Controller;

class ShopController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'products-all';

        $products = Products::find()->asArray()->all();

        return $this->render('index', [
            'products' => $products,
        ]);
    }

    public function actionView()
    {
        $this->layout = 'products-view';

        $id      = htmlspecialchars($_GET['id']);
        $product = Products::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'product' => $product,
        ]);
    }

    public function actionFilters()
    {
        $this->layout = false;
        $result_html  = '';
        $param1       = htmlspecialchars($_GET['param1']);
        $param2       = htmlspecialchars($_GET['param2']);
        $param3       = htmlspecialchars($_GET['param3']);
        $search       = htmlspecialchars($_GET['search']);

        $search = explode(' ', $search);

        $products = Products::find()
            ->filterWhere(['param1' => $param1])
            ->andFilterWhere(['param2' => $param2])
            ->andFilterWhere(['param3' => $param3])
            ->andFilterWhere(['like', 'name', $search])
            ->asArray()
            ->all();

        foreach ($products as $product) {
            $result_html .= $this->render('_product', [
                'product' => $product,
            ]);
        }

        return $result_html;
    }
}