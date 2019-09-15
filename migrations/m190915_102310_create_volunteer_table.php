<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%volunteer}}`.
 */
class m190915_102310_create_volunteer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%volunteer}}', [
            'id' => $this->primaryKey(),
            'team_id'=> $this->integer()->notNull(),
            'user_id'=> $this->integer()->notNull(),
            'volunteer_type'=> $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%volunteer}}');
    }
}
