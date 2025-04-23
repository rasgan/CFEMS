<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Production_Article}}`.
 */
class m250423_095036_create_Production_Article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Production_Article}}', [
            'id' => $this->primaryKey(),
            'item_no' => $this->string(20)->notNull()->unique(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Production_Article}}');
    }
}
