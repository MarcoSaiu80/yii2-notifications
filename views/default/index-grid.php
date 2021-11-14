
<?php

use kartik\daterange\DateRangePicker;
use kartik\grid\EditableColumn;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use kartik\grid\GridView as GridView;
use yii\bootstrap5\Html;
use kartik\grid\BooleanColumn;
//FontAwesomeAsset::register($this);
$this->title = Yii::t('modules/notifications', 'Notifications');

?>

<div class="page-header">
    <div class="buttons">
        <a class="btn btn-danger" href="<?= Url::toRoute(['/notifications/default/delete-all']) ?>"><?= Yii::t('modules/notifications', 'Delete all'); ?></a>
        <a class="btn btn-secondary" href="<?= Url::toRoute(['/notifications/default/read-all']) ?>"><?= Yii::t('modules/notifications', 'Mark all as read'); ?></a>
    </div>

    <h1>
        <span class="icon icon-bell"></span>
        <a href="<?= Url::to(['/notifications/manage']) ?>"><?= Yii::t('modules/notifications', 'Notifications') ?></a>
    </h1>
</div>

<div class="page-content">

    <ul id="notifications-items">
        <?php if ($notifications): ?>

        <?php echo GridView::widget([
                'moduleId' => 'gridview', // change the module identifier to use the respective module's settings
                'dataProvider' => $notifications,
                'columns' =>   [
                    'message',
                    ['attribute'=>'datetime',
                        'filterType' => GridView::FILTER_DATE_RANGE,
                        'filter'=>  DateRangePicker::widget([
                            'name' => 'createTimeRange',
                            'attribute' => 'datetime',
                            'convertFormat' => true,
                            'startAttribute'=> date('Y-m-d h:i'),
                            'endAttribute'=>date('Y-m-d h:i'),
                            'presetDropdown' => true,
                            'pluginOptions' => [
                                'timePicker' => true,
                                'timePickerIncrement' => 1,
                                'locale' => [
                                    'format' => 'Y-m-d h:i:s'
                                ]
                            ]
                        ])

                    ],
                    'timeago',
                    [
                        'attribute' => 'read',
//                        'class' => EditableColumn::class,
//                        'url2' => ['/']
                    ],
                    'type.code',
                    'managed'

                ]
                // other widget settings
            ]); ?>
        <?php if(false): ?>
        <?php foreach($notifications as $notif): ?>
        <li class="notification-item<?php if($notif['read']): ?> read<?php endif; ?>" data-id="<?= $notif['id']; ?>" data-key="<?= $notif['key']; ?>">
            <a href="<?= $notif['url'] ?>">
                <span class="icon"></span>
                <span class="message"><?= $notif['message']; ?></span>
            </a>
            <small class="timeago"><?= $notif['timeago']; ?></small>
            <span class="mark-read" data-toggle="tooltip" title="<?php if($notif['read']): ?><?= Yii::t('modules/notifications', 'Read') ?><?php else: ?><?= Yii::t('modules/notifications', 'Mark as read') ?><?php endif; ?>"></span>

        </li>
        <?php endforeach; ?>
        <?php endif;?>

        <?php else: ?>
            <li class="empty-row"><?= Yii::t('modules/notifications', 'There are no notifications to show') ?></li>
        <?php endif; ?>
    </ul>

    <?= LinkPager::widget(['pagination' => $pagination]); ?>

</div>
