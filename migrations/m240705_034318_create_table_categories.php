<?php

use yii\db\Migration;

/**
 * Class m240705_034318_create_table_categories
 */
class m240705_034318_create_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("categories", [
            "id" => $this->primaryKey(),
            "name" => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("categories");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240705_034318_create_table_categories cannot be reverted.\n";

        return false;
    }
    */
}
