<?php
use yii\helpers\Html;
use app\models\Registration;
use app\models\Team;
$total_seats = Team::find()->where(['event_id'=>$model->id])->sum('team_size');
$seats_left = $total_seats - Registration::find()->where(['event_id'=>$model->id])->count();
?>
<div class = "panel panel-primary" style="padding:10px; padding-right:20px;"> 
    <div class = "row "  >
        <div class = "col-md-6">
            <h2><?= $model->title ?></h2>
            <p>From <strong><?= $model->from_datetime ?></strong> to <strong><?= $model->to_datetime ?></strong></p>
            <p><?= $model->description ?></p>
           
        </div>
        <div class = "col-md-2">
            <div class = "panel panel-primary"  style="text-align:center; padding:2px;">
                    <font size="10"><?= $total_seats ?></font>
                    <p> Total Seats</p>
            </div>
            <?= Html::a('Detail View', ['/event/view','id'=>$model->id], ['class' => 'btn btn-default btn-group-justified']);?>
        </div>

        <div class = "col-md-2">
            <div class = "panel panel-primary"  style="text-align:center; padding:2px;">
                    <font size="10"><?= $seats_left ?></font>
                    <p>Seats left</p>
            </div>
            <?= Html::a('Registrations', ['site/event','id'=>$model->id], ['class' => 'btn btn-default btn-group-justified']);?>
        </div>
        
        <div class = "col-md-2" style="padding-left:25px; padding-right:25px;">
            <div class = "row" style="padding:2px;">
                
                <?= $model->publish ?(Html::a('Unpublish Event', ['/event/publish','id'=>$model->id], ['class' => 'btn btn-success btn-group-justified'])):( 
                    Html::a('Publish Event', ['/event/publish','id'=>$model->id], ['class' => 'btn btn-success btn-group-justified']));?>
            </div>
            <div class = "row" style="padding:2px;">
                <?= $model->close_reg ?(Html::a('Open Registrations', ['/event/close-reg','id'=>$model->id], ['class' => 'btn btn-danger btn-group-justified'])):(
                    Html::a('Close Registrations', ['/event/close-reg','id'=>$model->id], ['class' => 'btn btn-danger btn-group-justified']));?>
            </div>
            <div class = "row" style="padding:2px;">
                <?= $model->end_event ? (Html::a('Reopen Event', ['/event/end','id'=>$model->id], ['class' => 'btn btn-warning btn-group-justified'])):(
                    Html::a('End Event', ['/event/end','id'=>$model->id], ['class' => 'btn btn-warning btn-group-justified']));?>
            </div>
            <div class = "row" style="padding:2px;">
                <?= Html::a('Update Event', ['/event/update','id'=>$model->id], ['class' => 'btn btn-primary btn-group-justified']);?>
            </div>
        </div>
    </div>
</div>