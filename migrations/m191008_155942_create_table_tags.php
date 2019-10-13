<?php

use yii\db\Migration;

/**
 * Class m191008_155942_create_table_tags
 */
class m191008_155942_create_table_tags extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('tags',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('tags');
    }
}
