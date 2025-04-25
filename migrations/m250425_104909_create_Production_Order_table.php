<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Production_Order}}`.
 */
class m250425_104909_create_Production_Order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Production_Order}}', [
            'id' => $this->primaryKey(),
            'production_line_id' => $this->integer()->notNull(),
            'production_article_id' => $this->integer()->notNull(),
        ]);
        
        // creates index for column `production_line_id`
        $this->createIndex(
            'idx-production_order-production_line_id',
            'production_order',
            'production_line_id'
        );

        // add foreign key for table `production_line`
        $this->addForeignKey(
            'fk-production_order-production_line_id',
            'production_order',
            'production_line_id',
            'production_line',
            'id',
            'CASCADE'
        );
        
        // creates index for column `production_article_id`
        $this->createIndex(
            'idx-production_order-production_article_id',
            'production_order',
            'production_article_id'
        );

        // add foreign key for table `production_article`
        $this->addForeignKey(
            'fk-production_order-production_article_id',
            'production_order',
            'production_article_id',
            'production_article',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `production_line`
        $this->dropForeignKey(
            'fk-production_order-production_line_id',
            'production_order'
        );

        // drops index for column `production_line_id`
        $this->dropIndex(
            'idx-production_order-production_line_id',
            'production_order'
        );
        
        // drops foreign key for table `production_article`
        $this->dropForeignKey(
            'fk-production_order-production_article_id',
            'production_order'
        );

        // drops index for column `production_article_id`
        $this->dropIndex(
            'idx-production_order-production_article_id',
            'production_order'
        );
        
        $this->dropTable('{{%Production_Order}}');
    }
}
