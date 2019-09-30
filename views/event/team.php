<?php
use yii\grid\GridView;
$this->title = 'Team - Swachaa Amrita';
use app\models\User;
use kartik\switchinput\SwitchInput;
?>
<div class ="row">
    <div class = "col-md-7">
        <h1><?= $dataTeam->team_name ?></h1>
        <h3><?= $dataTeam->place_name ?></h3>
        <p><?= $dataTeam->description ?></p>

    </div>
    <div class="col-md-5">
        <br>
        <?= GridView::widget([
            'layout' => "{items}\n{pager}",
            'dataProvider' => $dataVolunteers,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => "Volunteer Name",
                    'value' => function ($data){
                        $user = User::find()->select(['name'])->where(['id' => $data->user_id])->one();
                        return $user->name;
                    }
                ],
                [
                    'label' => "Phone No",
                    'value' => function ($data){
                        $user = User::find()->select(['phone_no'])->where(['id' => $data->user_id])->one();
                        return $user->phone_no;
                    }
                ],
                [
                    'label' => "Role",
                    'value' => function ($data){
                                    $list = [ 1 => 'Overall Coordinator', 2 => 'Team Coordinator', 3 =>'Tools Coordinator', 4 => 'Refreshment Coordinator'];
                                    return $list[$data->volunteer_type];
                                }
                ],

            ],
        ]); ?>
    </div>
</div>
<h2>Members</h2>
<div class="col-md-7">
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
    ]
        
]);
?>
</div>