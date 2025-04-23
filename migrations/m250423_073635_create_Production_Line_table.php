<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Production_Line}}`.
 */
class m250423_073635_create_Production_Line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Production_Line}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Production_Line}}');
    }
}
