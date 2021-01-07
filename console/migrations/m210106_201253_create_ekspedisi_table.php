<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ekspedisi}}`.
 */
class m210106_201253_create_ekspedisi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ekspedisi}}', [
            'id' => $this->primaryKey(),
            'kota' => $this->string()->notNull(),
            'service_code' => $this->smallInteger()->notNull(),
            'berat' => $this->smallInteger()->notNull(),
            'harga' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ekspedisi}}');
    }
}
