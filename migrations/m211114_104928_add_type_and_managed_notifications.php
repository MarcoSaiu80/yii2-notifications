<?php

use yii\db\Migration;

/**
 * Class m211114_104928_add_type_and_managed_notifications
 */
class m211114_104928_add_type_and_managed_notifications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('notifications','type',$this->integer());
        $this->addColumn('notifications','managed',$this->boolean()->defaultValue(false));
        $this->addForeignKey('fk-notifications-type','notifications','type','notification_type','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('notifications','managed');
        $this->dropForeignKey(
            'fk-notification-type',
            'notification'
        );
        $this->dropColumn('notifications','type');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211114_104928_add_type_and_managed_notifications cannot be reverted.\n";

        return false;
    }
    */
}
