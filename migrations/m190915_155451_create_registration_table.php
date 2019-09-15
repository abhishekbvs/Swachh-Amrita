<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registration}}`.
 */
class m190915_155451_create_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registration}}', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer()->notNull(),
            'event_id'=>$this->integer()->notNull(),
            'team_id'=>$this->integer(),
            'created_at'=>$this->dateTime()->notNull(),
            'check_in'=>$this->dateTime(),
            'check_out'=>$this->dateTime()           
        ]);
        $this->addForeignKey('fk-reg-user','registration','user_id','user','id','CASCADE');
        $this->addForeignKey('fk-reg-event','registration','event_id','event','id','CASCADE');
        $this->addForeignKey('fk-reg-team','registration','team_id','team','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%registration}}');
    }
}
