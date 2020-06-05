<?php 

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Event;
use app\models\Team;
use app\models\User;

$user = User::find()->where(['id'=>Yii::$app->user->getId()])->one();
$this->title = 'Dashboard - Volunteer'
?>

<div class = row>   
    <div class = "col-md-3">
        <div class = "panel panel-warning"> 
            <div class="panel-heading">
                <div class ="row" style="padding:0px 10px 0px;">
                    <h4 class="pull-left">Profile</h4>
                    <h4 class="pull-right"><span class="label label-default">Volunteer</span></h4>
                </div>
            </div>
            <div class="panel-body">
                <h4><strong> Name : </strong><?= $user->name ?></h4>
                <p><strong> Email : </strong><?= $user->email_id ?></p>
                <p><strong> Phone No. : </strong><?= $user->phone_no ?></p>
                <p><strong> Roll No. : </strong><?= $user->roll_no ?></p>
                <div class="row" >
                    <div class = "col-md-5" style="padding:10px">
                         <?= Html::a('Edit Details', ['/user/update','id'=>$user->id], ['class' => 'btn btn-default']);?>
                    </div>

                    <div class = "col-md-7" style="padding:10px">
                         <?= Html::a('Reset Password', ['/user/change','id'=>$user->id], ['class' => 'btn btn-warning']);?>
                    </div>                                    
                </div>
            </div>
        </div>
    </div>

    <div class = "col-md-9">
        <h2>Registered Events</h2>    
        <br>  
        <?php foreach($dataRegs as $dataReg) :
                        $event = Event::find()->where(['id'=> $dataReg->event_id])->one();
                        $team = Team::find()->where(['id'=>$dataReg->team_id])->one();
                        ?>
            <div class = "panel panel-success"> 

                <div class="panel-heading"><h3><?= $event->title ?></h3></div>
                <div class="panel-body">
                    <div class = "col-md-9">
                        <p><?= $event->description ?></p>
                        <h3><?= $team->team_name?></h3>
                        <p><?= $team->place_name?></p>
                    </div>
                    <div class = "col-md-3">
                        <div class = "row" style="padding:5px;">
                            <?= Html::a('Event Details', ['/site/event','id'=>$event->id], ['class' => 'btn btn-default btn-group-justified']);?>
                        </div>
                        <div class = "row" style="padding:5px;">
                        <?= Html::a('Team Details', ['/event/team','id'=>$team->id], ['class' => 'btn btn-primary btn-group-justified']);?>
                        </div>
                        <div class = "row" style="padding:5px;">
                            <?= Html::a('Backout', ['/event/backout','id'=>$dataReg->id], [
                                'class' => 'btn btn-danger btn-group-justified ',
                                'data' => [
                                    'confirm' => 'Are you sure you want to de-register for this event?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>           
            </div>
        <?php endforeach; ?>
    </div>
</div>


   
    
