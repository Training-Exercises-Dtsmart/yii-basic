<?php

use yii\db\Migration;

/**
 * Class m240705_034446_update_table_products
 */
class m240705_034446_update_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("products", "category_id", $this->integer());
        $this->addForeignKey("fk-products-category_id", "products", "category_id", "categories", "id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk-products-category_id", "products");
        $this->dropColumn("products", "category_id");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240705_034446_update_table_products cannot be reverted.\n";

        return false;
    }
    */
}
