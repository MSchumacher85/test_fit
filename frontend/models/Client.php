<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string|null $FIO ФИО
 * @property string|null $sex
 * @property string|null $date_of_birth День рождения
 * @property string|null $date_of_creation Дата создания
 * @property int|null $created_by_whom Кем создано
 * @property string|null $date_of_update Дата обновления
 * @property int|null $updated_by_whom Кем обновлено
 * @property string|null $date_of_deletion Дата удаления
 * @property int|null $deleted_by_whom Кем удалено
 *
 * @property ClubClient[] $clubClients
 * @property Club[] $clubs
 * @property User $createdByWhom
 * @property User $deletedByWhom
 * @property User $updatedByWhom
 */
class Client extends \yii\db\ActiveRecord
{

    public $clubList;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->date_of_creation = date('Y-m-d H:i:s');
            $this->created_by_whom = Yii::$app->user->id;
        } else {
            $this->date_of_update = date('Y-m-d H:i:s');
            $this->updated_by_whom = Yii::$app->user->id;
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function beforeDelete()
    {
        $this->date_of_deletion = date('Y-m-d H:i:s');

        $this->deleted_by_whom = Yii::$app->user->id;
        $this->save();

        return  false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clubList'], 'safe'],
            [['sex'], 'string'],
            [['date_of_birth'], 'date','format'=>'php:Y-m-d'],
            [['date_of_creation', 'date_of_update', 'date_of_deletion'], 'safe'],
            [['created_by_whom', 'updated_by_whom', 'deleted_by_whom'], 'integer'],
            [['FIO'], 'string', 'max' => 255],
            [['created_by_whom'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_whom' => 'id']],
            [['deleted_by_whom'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['deleted_by_whom' => 'id']],
            [['updated_by_whom'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by_whom' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'clubList' => 'Доступные клубы',
            'id' => 'ID',
            'FIO' => 'ФИО',
            'sex' => 'Пол',
            'date_of_birth' => 'Дата рождения',
            'date_of_creation' => 'Дата создания',
            'created_by_whom' => 'Кто создал',
            'date_of_update' => 'Дата обновления',
            'updated_by_whom' => 'Кто обновил',
            'date_of_deletion' => 'Дата удаления',
            'deleted_by_whom' => 'Кто удалил',
        ];
    }

    /**
     * Gets query for [[ClubClients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClubClients()
    {
        return $this->hasMany(ClubClient::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Clubs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClubs()
    {
        return $this->hasMany(Club::class, ['id' => 'club_id'])->viaTable('club_client', ['client_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedByWhom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedByWhom()
    {
        return $this->hasOne(User::class, ['id' => 'created_by_whom']);
    }

    /**
     * Gets query for [[DeletedByWhom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeletedByWhom()
    {
        return $this->hasOne(User::class, ['id' => 'deleted_by_whom']);
    }

    /**
     * Gets query for [[UpdatedByWhom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedByWhom()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by_whom']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function refreshClubs()
    {
        ClubClient::deleteAll(['client_id'=>$this->id]);

        if(is_array($this->clubList)){
            foreach ($this->clubList as $id){
                $clubClient = new ClubClient();
                $clubClient->club_id = $id;
                $clubClient->client_id = $this->id;

                $clubClient->save();
            }
        }
    }
}
