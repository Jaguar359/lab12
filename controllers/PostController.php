<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * Блог
 * @package app\controllers
 */
class PostController extends Controller
{
    public $layout = 'post-all';

    /**
     * Все посты
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Обзор конкретного
     *
     * @return string
     */
    public function actionView()
    {
        return $this->render('view');
    }
}