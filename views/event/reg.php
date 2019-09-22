<?php
use yii\grid\GridView;
$this->title = 'Team - Swachaa Amrita';
use app\models\User;
?>

<?= GridView::widget([
    'dataProvider' => $dataParticipants,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'Name',
            'value' => function($data){
                $user = User::find()->select(['name'])->where(['id' => $data->user_id])->one();
                return $user->name;
            }
        ],
        [
            'label' => 'Roll No.',
            'value' => function($data){
                $user = User::find()->select(['roll_no'])->where(['id' => $data->user_id])->one();
                return $user->roll_no;
            }
        ],
        [
            'label' => 'Phone No.',
            'value' => function($data){
                $user = User::find()->select(['phone_no'])->where(['id' => $data->user_id])->one();
                return $user->phone_no;
            }
        ]
       
    ]
]);
?>

