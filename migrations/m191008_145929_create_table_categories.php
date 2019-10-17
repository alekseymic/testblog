<?php

use yii\db\Migration;

/**
 * Class m191008_155929_create_table_categories
 */
class m191008_145929_create_table_categories extends Migration
{
        // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'age_restriction' => $this->integer(),
            'slug' => $this->string()->notNull(),
            'keywords' => $this->text(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('categories');
    }

}
