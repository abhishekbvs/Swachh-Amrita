<?php

namespace app\models;

use app\models\Team;
use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $from_datetime
 * @property string $to_datetime
 * @property int $publish
 * @property int $close_reg
 * @property int $end_event
 *
 * @property User $user 
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'from_datetime', 'to_datetime'], 'required'],
            [['publish', 'close_reg', 'end_event'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['from_datetime', 'to_datetime'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'from_datetime' => 'From Datetime',
            'to_datetime' => 'To Datetime',
            'publish' => 'Publish',
            'close_reg' => 'Close Reg',
            'end_event' => 'End Event',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getTeam()
    {
        return $this->hasMany(NtroVisitor::className(), ['visitorpass_id' => 'visitorpass_id']);
    }

    public function getTeams($id)
    {
      return Team::find()->where(['event_id' => $id])->all();
    }
}
