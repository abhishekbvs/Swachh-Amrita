<?php 

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Event;
use yii\wigets\Team;

$this->title = 'Dashboard - Participant'
?>
<div class="user-index">
    <div class="row">      
        <h1 class="pull-left"><?= Html::encode($this->title) ?></h1>        
    </div>
</div>
<div class = "col-md-4">
</div>
<div class = "col-md-8">
    <h2>Registered Events</h2>
    <?php foreach($dataRegs as $dataReg) :?>
        <?php $event = Event::find()->where(['id'=> $dataReg->event_id])->one();
              $team = Team::find()->where(['id'=>$dataReg->event_id])->one();
        ?>
        <div class="panel panel-sucess">
            <div class="row">
                <h3 class="pull-left"> <?= $event->name?></h3>
                <h3 class="pull-right"> <?= $event->name?></h3>
            </div>
        </div>
    <? endforeach; ?>
</div>