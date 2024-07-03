<?php

use yii\db\Migration;

/**
 * Class m240703_023133_create_table_products
 */
class m240703_023133_create_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("products", [
            "id" => $this->primaryKey(),
            "name" => $this->string(),
            "price" => $this->double()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("products");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240703_023133_create_table_products cannot be reverted.\n";

        return false;
    }
    */
}
