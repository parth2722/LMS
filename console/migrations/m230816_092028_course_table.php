<?php

use yii\db\Migration;

/**
 * Class m230816_092028_course_table
 */
class m230816_092028_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'course_name' => $this->string(50)->notNull(),
            'created_at' => $this->timestamp()->defaultValue(null),
            'update_at' => $this->timestamp()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%course}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230816_092028_course_table cannot be reverted.\n";

        return false;
    }
    */
}
