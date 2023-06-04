<?php

namespace app\models\db;

/**
 * This is the model class for table "posts".
 *
 * @property int         $id
 * @property string      $title
 * @property string|null $image
 * @property string      $content
 * @property int         $datetime
 * @property int         $views
 * @property int         $likes
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                    'content',
                    'datetime',
                    'views',
                    'likes',
                ],
                'required',
            ],
            [
                ['content'],
                'string',
            ],
            [
                [
                    'datetime',
                    'views',
                    'likes',
                ],
                'integer',
            ],
            [
                [
                    'title',
                    'image',
                ],
                'string',
                'max' => 255,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'       => 'ID',
            'title'    => 'Название',
            'image'    => 'Картинка',
            'content'  => 'Контент',
            'datetime' => 'Дата время',
            'views'    => 'Просмотров',
            'likes'    => 'Лайков',
        ];
    }
}
