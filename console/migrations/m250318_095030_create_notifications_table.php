<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notifications}}`.
 */
class m250318_095030_create_notifications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notifications}}', [
            'id' => $this->primaryKey(),
            'resource_id' => $this->integer()->notNull(),
            'type' => "ENUM('error', 'info', 'warning') NOT NULL",
            'message' => $this->text()->notNull(),
            'error_code' => $this->string(50)->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => "ENUM('pending', 'sent', 'failed') DEFAULT 'pending'",
        ]);

        $this->addForeignKey(
            'fk-notifications-resource_id',
            'notifications',
            'resource_id',
            'resources',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-notifications-resource_id', 'notifications');
        $this->dropTable('{{%notifications}}');
    }
}
