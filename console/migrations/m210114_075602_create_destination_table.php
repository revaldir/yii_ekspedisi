<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%destination}}`.
 */
class m210114_075602_create_destination_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%destination}}', [
            'id' => $this->primaryKey(),
            'kota' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%destination}}');
    }
}
