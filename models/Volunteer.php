<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "volunteer".
 *
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 * @property int $volunteer_type
 */
class Volunteer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'volunteer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id', 'user_id', 'volunteer_type'], 'required'],
            [['team_id', 'user_id', 'volunteer_type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_id' => 'Team ID',
            'user_id' => 'User ID',
            'volunteer_type' => 'Volunteer Type',
        ];
    }
}