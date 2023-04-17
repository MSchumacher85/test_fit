<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "club_client".
 *
 * @property int $club_id
 * @property int $client_id
 *
 * @property Client $client
 * @property Club $club
 */
class ClubClient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_id', 'client_id'], 'required'],
            [['club_id', 'client_id'], 'integer'],
            [['club_id', 'client_id'], 'unique', 'targetAttribute' => ['club_id', 'client_id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::class, 'targetAttribute' => ['club_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'club_id' => 'Club ID',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Club]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Club::class, ['id' => 'club_id']);
    }
}
