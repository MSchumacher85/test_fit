<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m230416_205136_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'FIO' => $this->string()->comment('ФИО'),
            'sex' => 'ENUM("0", "1")',
            'date_of_birth' => $this->date('Y-m-d')->comment('День рождения'),
            'date_of_creation' => $this->date('Y-m-d H:i:s')->comment('Дата создания'),
            'created_by_whom' => $this->integer()->comment('Кем создано'),
            'date_of_update' => $this->date('Y-m-d H:i:s')->comment('Дата обновления'),
            'updated_by_whom' => $this->integer()->comment('Кем обновлено'),
            'date_of_deletion' => $this->date('Y-m-d H:i:s')->comment('Дата удаления'),
            'deleted_by_whom' => $this->integer()->comment('Кем удалено'),
        ]);
        $this->addForeignKey(
            'fk-client-createdByWhom_id',
            'client',
            'created_by_whom',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-client-updatedByWhom_id',
            'client',
            'updated_by_whom',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-client-deletedByWhom_id',
            'client',
            'deleted_by_whom',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
