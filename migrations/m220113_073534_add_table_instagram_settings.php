<?php

use yii\db\Migration;

/**
 * Class m220113_073534_add_table_instagram_settings
 */
class m220113_073534_add_table_instagram_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER DATABASE instagram CHARACTER SET utf8 COLLATE utf8_general_ci;');
        $this->createTable('instagram_settings', ['id' => $this->primaryKey(),
            'user' => $this->string(128),
            'count_posts' => $this->tinyInteger()]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('instagram_settings');
    }
}

