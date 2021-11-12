<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $class
 * @property string $key
 * @property string $message
 * @property string $route
 * @property int $seen
 * @property int $read
 * @property int $user_id
 * @property int $created_at
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class', 'key', 'message', 'route'], 'required'],
            [['seen', 'read', 'user_id', 'created_at'], 'integer'],
            [['class'], 'string', 'max' => 64],
            [['key'], 'string', 'max' => 32],
            [['message', 'route'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
            'key' => 'Key',
            'message' => 'Message',
            'route' => 'Route',
            'seen' => 'Seen',
            'read' => 'Read',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }
}
