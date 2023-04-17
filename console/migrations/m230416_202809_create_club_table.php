<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%club}}`.
 */
class m230416_202809_create_club_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%club}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Название клуба')->notNull(),
            'address' => $this->string()->comment('Адресс'),
            'date_of_creation' => $this->date('Y-m-d H:i:s')->comment('Дата создания'),
            'created_by_whom' => $this->integer()->comment('Кем создано'),
            'date_of_update' => $this->date('Y-m-d H:i:s')->comment('Дата обновления'),
            'updated_by_whom' => $this->integer()->comment('Кем обновлено'),
            'date_of_deletion' => $this->date('Y-m-d H:i:s')->comment('Дата удаления'),
            'deleted_by_whom' => $this->integer()->comment('Кем удалено'),
        ]);

        $this->addForeignKey(
            'fk-club-createdByWhom_id',
            'club',
            'created_by_whom',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-club-updatedByWhom_id',
            'club',
            'updated_by_whom',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-club-deletedByWhom_id',
            'club',
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
        $this->dropTable('{{%club}}');
    }
    }
