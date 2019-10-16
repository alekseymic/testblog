<?php

use yii\db\Migration;

/**
 * Class m191008_155929_create_table_categories
 */
class m191008_155929_create_table_categories extends Migration
{
        // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'age_restriction' => $this->integer(),
            'slug' => $this->string()->notNull(),
            'keywords' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('categories');
    }

}
