<?php

namespace app\controllers;

use yii\web\Controller;

class SocialController extends Controller
{
    public $layout = 'social';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPosts()
    {
        $posts = [
            '1' => [
                'title'   => 'Название поста',
                'content' => 'Контент поста',
            ],
            '2' => [
                'title'   => 'Название поста',
                'content' => 'Контент поста',
            ],
            '3' => [
                'title'   => 'Название поста',
                'content' => 'Контент поста',
            ],
        ];

        return $this->render('posts', [
            'posts' => $posts,
        ]);
    }

    public function actionComments()
    {
        return $this->render('comments');
    }
}