<?php

use yii\db\Migration;

/**
 * Class m240703_041442_update_table_products
 */
class m240703_041442_update_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("products", "status", $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("products", "status");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240703_041442_update_table_products cannot be reverted.\n";

        return false;
    }
    */
}
