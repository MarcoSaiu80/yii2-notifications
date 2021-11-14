<?php

namespace webzop\notifications\models;

use Yii;

/**
 * This is the model class for table "notification_type".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $check_management
 * @property string $color
 * @property int $priority
 * @property int|null $notification_id
 * @property int $created_at
 *
 * @property Notifications $notification
 */
class NotificationType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'check_management', 'color', 'priority'], 'required'],
            [['code', 'color'], 'string'],
            [['check_management', 'priority', 'notification_id', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['notification_id'], 'exist', 'skipOnError' => true, 'targetClass' => Notifications::className(), 'targetAttribute' => ['notification_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'check_management' => Yii::t('app', 'Check Management'),
            'color' => Yii::t('app', 'Color'),
            'priority' => Yii::t('app', 'Priority'),
            'notification_id' => Yii::t('app', 'Notification ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Notification]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotification()
    {
        return $this->hasOne(Notifications::className(), ['id' => 'notification_id']);
    }
}
