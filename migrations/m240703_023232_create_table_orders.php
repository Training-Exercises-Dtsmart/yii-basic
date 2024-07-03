<?php

use yii\db\Migration;

/**
 * Class m240703_023232_create_table_orders
 */
class m240703_023232_create_table_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("orders", [
            "id" => $this->primaryKey(),
            "total" => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("orders");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240703_023232_create_table_orders cannot be reverted.\n";

        return false;
    }
    */
}
