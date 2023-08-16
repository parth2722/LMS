<?php

use yii\db\Migration;

/**
 * Class m230816_091929_class_table
 */
class m230816_091929_class_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%class}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string(50)->notNull(),
            'class_name' => $this->string(50)->notNull(),
            'module_id' => $this->integer(50)->notNull(),
            'created_at' => $this->timestamp()->defaultValue(null),
            'update_at' => $this->timestamp()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%class}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230816_091929_class_table cannot be reverted.\n";

        return false;
    }
    */
}
