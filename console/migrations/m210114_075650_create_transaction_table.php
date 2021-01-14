<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaction}}`.
 */
class m210114_075650_create_transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction}}', [
            'req_id' => $this->primaryKey(),
            'loc_id' => $this->integer()->notNull(),
            'dest_id' => $this->integer()->notNull(),
            'price_id' => $this->integer()->notNull()
        ]);
        
        // INDEX FOR LOCATION
        $this->createIndex(
            'idx-transaction-loc_id', 
            'transaction', 
            'loc_id'
        );
        // FK FOR LOCATION
        $this->addForeignKey(
            'fk-transaction-loc_id',
            'transaction',
            'loc_id',
            'location',
            'id',
            'CASCADE'
        );

        // INDEX FOR DESTINATION
        $this->createIndex(
            'idx-transaction-dest_id', 
            'transaction', 
            'dest_id'
        );
        // FK FOR DESTINATION
        $this->addForeignKey(
            'fk-transaction-dest_id',
            'transaction',
            'dest_id',
            'destination',
            'id',
            'CASCADE'
        );

        // INDEX FOR PRICE
        $this->createIndex(
            'idx-transaction-price_id', 
            'transaction', 
            'price_id'
        );
        // FK FOR PRICE
        $this->addForeignKey(
            'fk-transaction-price_id',
            'transaction',
            'price_id',
            'price',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transaction}}');

        // DROP INDEX FOR LOCATION
        $this->dropIndex(
            'idx-transaction-loc_id',
            'transaction'
        );
        // DROP FK FOR LOCATION
        $this->dropForeignKey(
            'fk-transaction-loc_id',
            'transaction'
        );

        // DROP INDEX FOR DESTINATION
        $this->dropIndex(
            'idx-transaction-dest_id',
            'transaction'
        );
        // DROP FK FOR DESTINATION
        $this->dropForeignKey(
            'fk-transaction-dest_id',
            'transaction'
        );

        // DROP INDEX FOR PRICE
        $this->dropIndex(
            'idx-transaction-price_id',
            'transaction'
        );
        // DROP FK FOR PRICE
        $this->dropForeignKey(
            'fk-transaction-price_id',
            'transaction'
        );
    }
}
