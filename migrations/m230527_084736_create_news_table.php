<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m230527_084736_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id'       => $this->primaryKey(),
            'title'    => $this->string()->comment('Название')->notNull(),
            'image'    => $this->string()->comment('Изображение')->notNull(),
            'datetime' => $this->integer()->comment('Время создания'),
            'content'  => $this->text()->comment('Новость'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
