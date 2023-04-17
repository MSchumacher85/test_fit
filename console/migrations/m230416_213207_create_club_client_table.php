<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club_client}}`.
 */
class m230416_213207_create_club_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club_client}}', [
            'club_id' => $this->integer(),
            'client_id' => $this->integer(),
            'PRIMARY KEY (club_id,client_id)'
        ]);
        $this->addForeignKey(
            'fk_club_client_clubId',
            'club_client',
            'club_id',
            'club',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_club_client_clientId',
            'club_client',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%club_client}}');
    }
}