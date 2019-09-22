<?php 

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Event;
use app\models\Team;

$this->title = 'Dashboard - Participant'
?>
<div class="col-md-12">      
    <h1><?= Html::encode($this->title) ?></h1>
    
</div>
   
<div class = "col-md-3">
</div>
<div class = "col-md-9">
    <h2>Registered Events</h2>    
    <br>  
    <?php foreach($dataRegs as $dataReg) :
                    $event = Event::find()->where(['id'=> $dataReg->event_id])->one();
                    $team = Team::find()->where(['id'=>$dataReg->event_id])->one();
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
                     <?= Html::a('Team Details', ['/event/team','id'=>$team->id], ['class' => 'btn btn-default btn-group-justified']);?>
                    </div>
                    <div class = "row" style="padding:5px;">
                        <?= Html::a('Revert Seat', ['/event/dereg','id'=>$event->id], ['class' => 'btn btn-danger btn-group-justified']);?>
                    </div>
                </div>
            </div>


        
        </div>

    <?php endforeach; ?>
</div>


   
    
