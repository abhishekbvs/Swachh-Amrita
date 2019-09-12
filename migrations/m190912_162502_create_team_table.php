<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%team}}`.
 */
class m190912_162502_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%team}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'team_name' =>  $this->string()->notNull(),
            'place_name' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'team_size' => $this->integer()->defaultValue(0)->notNull()
        ]);
        $this->addForeignKey('fk-event-team','team','event_id','event','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%team}}');
    }
}
