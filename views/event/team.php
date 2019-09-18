<?php
use yii\grid\GridView;
$this->title = 'Team - Swachaa Amrita';
?>

<?= GridView::widget([
        'dataProvider' => $dataVolunteers,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'team_id',
            'user_id',
            'volunteer_type',
            // 'name',
            // 'phone_no',
            // 'email_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>