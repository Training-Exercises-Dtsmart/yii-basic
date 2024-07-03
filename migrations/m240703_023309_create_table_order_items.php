<?php

use yii\db\Migration;

/**
 * Class m240703_023309_create_table_order_items
 */
class m240703_023309_create_table_order_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("order_items", [
            "id" => $this->primaryKey(),
            "product_id" => $this->integer(),
            "order_id" => $this->integer(),
            "price" => $this->double(),
            "created_at" => $this->dateTime(),
            "updated_at" => $this->dateTime()
        ]);

        $this->addForeignKey(
            'fk-order_items-product_id',
            'order_items',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order_items-order_id',
            'order_items',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk-order_items-order_id","order_items");
        $this->dropForeignKey("fk-order_items-product_id","order_items");
        $this->dropTable("order_items");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240703_023309_create_table_order_items cannot be reverted.\n";

        return false;
    }
    */
}
