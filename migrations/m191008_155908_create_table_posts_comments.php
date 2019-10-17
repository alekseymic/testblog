<?php

use yii\db\Migration;

/**
 * Class m191008_155908_create_table_posts_comments
 */
class m191008_155908_create_table_posts_comments extends Migration
{

    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
//      TODO:comment_attachemnts table?
        $this->createTable('post_comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'parent_id' => $this->integer()->notNull(),
            'content' => $this->text(),

        ], $tableOptions);

        $this->createIndex(
            'idx-post_comments-user_id',
            'post_comments',
            'user_id'
        );

        $this->createIndex(
            'idx-post_comments-post_id',
            'post_comments',
            'post_id'
        );

        $this->addForeignKey(
            'fk-post_comments-user_id',
            'post_comments',
            'user_id',
            'users',
            'id'
        );

        $this->addForeignKey(
            'fk-post_comments-post_id',
            'post_comments',
            'post_id',
            'posts',
            'id'
        );


    }

    public function down()
    {
        $this->dropTable('post_comments');
    }
}
