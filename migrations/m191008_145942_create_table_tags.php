<?php

use yii\db\Migration;

/**
 * Class m191008_155942_create_table_tags
 */
class m191008_145942_create_table_tags extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('tags',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('tags');
    }
}
