<?php

use yii\db\Migration;

/**
 * Class m191008_155825_create_table_posts
 */
class m191008_155825_create_table_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'is_published' => $this->boolean()->notNull(),
            'is_deleted' => $this->boolean()->notNull()->defaultValue('FALSE'),
            'published_at' => $this->timestamp(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->append('ON UPDATE NOW()'),
            'deleted_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('posts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191008_155825_create_table_posts cannot be reverted.\n";

        return false;
    }
    */
}
