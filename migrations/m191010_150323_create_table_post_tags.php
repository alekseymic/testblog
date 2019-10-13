<?php

use yii\db\Migration;

/**
 * Class m191010_150323_create_table_post_tags
 */
class m191010_150323_create_table_post_tags extends Migration
{
    public function up()
    {
        $this->createTable('post_tags', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx-post_tags-tag_id',
            'post_tags',
            'tag_id'
        );
        $this->createIndex(
            'idx-post_tags-post_id',
            'post_tags',
            'post_id'
        );

        $this->addForeignKey(
            'fk-post_tags-post_id',
            'post_tags',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-post_tags-tag_id',
            'post_tags',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('post_tags');
    }
}
