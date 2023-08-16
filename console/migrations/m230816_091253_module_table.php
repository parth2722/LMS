<?php

use yii\db\Migration;

/**
 * Class m230816_091253_module_table
 */
class m230816_091253_module_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%module}}', [
            'id' => $this->primaryKey(),
            'module_name' => $this->string(50)->notNull(),
            'course_id' => $this->integer(50)->notNull(),
            'created_at' => $this->timestamp()->defaultValue(null),
            'update_at' => $this->timestamp()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%module}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230816_091253_module_table cannot be reverted.\n";

        return false;
    }
    */
}
