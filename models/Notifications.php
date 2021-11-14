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
 * @property int|null $type
 * @property int|null $managed
 *
 * @property NotificationType $type0
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
            [['seen', 'read', 'user_id', 'created_at', 'type', 'managed'], 'integer'],
            [['class'], 'string', 'max' => 64],
            [['key'], 'string', 'max' => 32],
            [['message', 'route'], 'string', 'max' => 255],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationType::className(), 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'class' => Yii::t('app', 'Class'),
            'key' => Yii::t('app', 'Key'),
            'message' => Yii::t('app', 'Message'),
            'route' => Yii::t('app', 'Route'),
            'seen' => Yii::t('app', 'Seen'),
            'read' => Yii::t('app', 'Read'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'type' => Yii::t('app', 'Type'),
            'managed' => Yii::t('app', 'Managed'),
        ];
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(NotificationType::className(), ['id' => 'type']);
    }
}
