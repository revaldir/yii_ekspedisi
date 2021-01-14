<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price}}`.
 */
class m210114_075632_create_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%price}}', [
            'id' => $this->primaryKey(),
            'min' => $this->float()->notNull(),
            'max' => $this->float()->notNull(),
            'price' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%price}}');
    }
}
