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
        
    </div>
</div>
<h2>Members</h2>
<div class="col-md-9">
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
        ],
        [
            'attribute' => 'Check In',
            'format' => 'raw',
            'value' => function($data){
                    return SwitchInput::widget([
                        'name' => 'Check In',
                        'pluginEvents' => [
                            'switchChange.bootstrapSwitch' => "function(e){sendCheckInRequest(e.currentTarget.checked, $data->user_id);}"
                        ],
                        'pluginOptions' => [
                            'size' => 'mini',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                            'onText' => 'Yes',
                            'offText' => 'No',
                        ],
                        'value' => $data->check_in ? TRUE : FALSE,
                    ]);
                }
           
        ],
        [
            'attribute' => 'Check Out',
            'format' => 'raw',
            'value' => function($data){
                    return SwitchInput::widget([
                        'name' => 'Check Out',
                        'pluginEvents' => [
                            'switchChange.bootstrapSwitch' => "function(e){sendCheckInRequest(e.currentTarget.checked, $data->user_id);}"
                        ],
                        'pluginOptions' => [
                            'size' => 'mini',
                            'onColor' => 'success',
                            'offColor' => 'danger',
                            'onText' => 'Yes',
                            'offText' => 'No',
                        ],
                        'value' => $data->check_in ? TRUE : FALSE,
                    ]);
                }
           
        ],
    ]
        
]);
?>
</div>