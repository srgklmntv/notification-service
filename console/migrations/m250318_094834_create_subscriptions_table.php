<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscriptions}}`.
 */
class m250318_094834_create_subscriptions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscriptions}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'resource_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-subscriptions-user_id',
            'subscriptions',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-subscriptions-resource_id',
            'subscriptions',
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
        $this->dropForeignKey('fk-subscriptions-user_id', 'subscriptions');
        $this->dropForeignKey('fk-subscriptions-resource_id', 'subscriptions');
        $this->dropTable('{{%subscriptions}}');
    }
}
