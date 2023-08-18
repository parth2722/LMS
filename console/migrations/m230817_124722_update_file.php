<?php

use yii\db\Migration;

/**
 * Class m230817_124722_update_file
 */
class m230817_124722_update_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Use the execute() method to run the ALTER TABLE statement
        $this->execute("ALTER TABLE `class` MODIFY COLUMN `file` VARCHAR(255) DEFAULT NULL;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230817_124722_update_file cannot be reverted.\n";

        return false;
    }
}
