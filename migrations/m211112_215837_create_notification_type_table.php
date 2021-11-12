<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notification_type}}`.
 */
class m211112_215837_create_notification_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notification_type}}', [
            'id' => $this->primaryKey(),
            'code'=> $this->text()->notNull(),
            'name'=> $this->string(255)->notNull(),
            'check_management'=> $this->boolean()->notNull(),
            'color'=>$this->text()->notNull(),
            'priority'=>$this->integer()->notNull(),
            'notification_id' => $this->integer(),
            'created_at' => $this->integer(11)->unsigned()->notNull()->defaultValue(0),

        ]);
        $this->addForeignKey('fk_notification_type_notifications', 'notification_type', 'notification_id', 'notifications', 'id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notification_type}}');
    }
}
