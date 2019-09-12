<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m190912_052620_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer()->notNull(),
            'title'=>  $this->string()->notNull(),
            'description'=>  $this->string()->notNull(),
            'from_datetime'=> $this->string(100)->notNull(),
            'to_datetime'=> $this->string(100)->notNull(),
            'publish'=> $this->boolean()->defaultValue(false)->notNull(),
            'close_reg'=> $this->boolean()->defaultValue(false)->notNull(),
            'end_event'=> $this->boolean()->defaultValue(false)->notNull(),
        ]);
        $this->addForeignKey('fk-event-created-by','event','user_id','user','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event}}');
    }
}
