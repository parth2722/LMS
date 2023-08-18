<?php

use yii\db\Migration;

/**
 * Class m230818_041748_addcoloum
 */
class m230818_041748_addcoloum extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%class}}', 'file_path', $this->string(255)->after('file'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230818_041748_addcoloum cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230818_041748_addcoloum cannot be reverted.\n";

        return false;
    }
    */
}
