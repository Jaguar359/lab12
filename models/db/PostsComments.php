<?php

namespace app\models\db;

/**
 * This is the model class for table "posts_comments".
 *
 * @property int      $id
 * @property int|null $user_id
 * @property int      $datetime
 * @property string   $comment
 * @property int      $post_id
 */
class PostsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'user_id',
                    'datetime',
                    'post_id',
                ],
                'integer',
            ],
            [
                [
                    'datetime',
                    'comment',
                    'post_id',
                ],
                'required',
            ],
            [
                ['comment'],
                'string',
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
            'user_id'  => 'User ID',
            'datetime' => 'Datetime',
            'comment'  => 'Comment',
            'post_id'  => 'Post ID',
        ];
    }
}
