<?php

use yii\db\Migration;

/**
 * Class m191010_150308_create_table_post_categories
 */
class m191010_150308_create_table_post_categories extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('post_categories', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx-post_categories-category_id',
            'post_categories',
            'category_id'
        );
        $this->createIndex(
            'idx-post_categories-post_id',
            'post_categories',
            'post_id'
        );

        $this->addForeignKey(
            'fk-post_categories-post_id',
            'post_categories',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-post_categories-category_id',
            'post_categories',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('post_categories');
    }
}
