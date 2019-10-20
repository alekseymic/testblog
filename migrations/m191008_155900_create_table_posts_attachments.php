<?php

use yii\db\Migration;

/**
 * Class m191008_155900_create_table_posts_attachments
 */
class m191008_155900_create_table_posts_attachments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('post_attachments', [
            'id'=> $this->primaryKey(),
            'post_id' => $this->integer(),
            'name' => $this->string(),
            'path' => $this->string()
        ], $tableOptions);

        $this->createIndex(
            'idx-post_attachments-post_id',
            'post_attachments',
            'post_id'
        );

        /*
         * Cascade delete or save for FBI?
         * */
        $this->addForeignKey(
            'fk-post_attachments-post_id',
            'post_attachments',
            'post_id',
            'posts',
            'id'
        );



    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('post_attachments');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191008_155900_create_table_posts_attachments cannot be reverted.\n";

        return false;
    }
    */
}
