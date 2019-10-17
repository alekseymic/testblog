<?php

use yii\db\Migration;

/**
 * Class m191008_155825_create_table_posts
 */
class m191008_155825_create_table_posts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'status' => $this->boolean()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
            'deleted_at' => $this->integer()->unsigned()->defaultValue(0),
            'published_at' => $this->integer()->unsigned(),
        ], $tableOptions);

        $this->createIndex(
            'idx-posts-user_id',
            'posts',
            'user_id'
        );

        $this->addForeignKey(
            'fk-posts-user_id',
            'posts',
            'user_id',
            'users',
            'id'
        );

        $this->createIndex(
            'idx-posts-category-id',
            'posts',
            'category_id'
        );

        $this->addForeignKey(
            'fk-posts-category_id',
            'posts',
            'category_id',
            'categories',
            'id'
        );
    }

    public function down()
    {
       $this->dropTable('posts');
    }
}
