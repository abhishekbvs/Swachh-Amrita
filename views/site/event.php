<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Registration;

$this->title = "Event - Swachh Amrita"
?>
<div class = "row" style="padding:0px 10px 0px;">
    <h1 class="pull-left"><?= $dataEvent->title ?></h1>
    <h3 class="pull-right"><?= $dataEvent->close_reg ? '<span class="label label-danger">CLOSED</span>' : '<span class="label label-success">OPENED</span>';?></h3>
</div>

<p style="font-size:20px"> <strong> From <?= $dataEvent->from_datetime ?> to <?= $dataEvent->to_datetime ?> </strong> </p>

<p><?= $dataEvent->description ?></p>
<br>

<?php foreach($dataTeams as $model): ?>
    <?php $seats_left = $model->team_size - Registration::find()->where(['team_id' => $model->id])->count();?>
    <div class = "col-md-6">
    <div class = "panel panel-primary" style= "<?= $seats_left ? "background-color: #E5FFCC;": "background-color: #fc888b" ?>" >
        <div class = "row"  style="padding:10px;" >
            <div class = "col-md-6">
                <h2><?= $model->team_name ?><h2>
                <h4><?= $model->place_name ?></h4>
                <p><?= $model->description ?></p>
            </div>
            <div class = "col-md-3">
            <div class = "row" style="padding:0px 15px 15px">
                <div class = "panel panel-primary"  style="text-align:center;">
                    <font size="10"> <?= $model->team_size ?></font>
                    <p> Total Seats</p>
                </div>
                
                    <?= Html::a('Details', ['/event/team','id'=>$model->id], ['class' => 'btn btn-primary btn-group-justified']);?>
                </div>
            </div>
            <div class = "col-md-3">
                <div class = "panel panel-primary"  style="text-align:center;">
                    <font size="10">  <?= $seats_left ?></font>
                    <p> Seats left</p>
                </div>
                <?= ($seats_left and !$dataEvent->close_reg) ? Html::a('Register', ['/event/register','id'=>$model->id], [                
               
                    'class' => 'btn btn-success btn-group-justified ',
                    'data' => [
                        'confirm' => 'Are you sure you want to register for this event?',
                        'method' => 'post',
                    ],
                    ]) :'';?>
            </div>
        </div>
    </div>
</div>


<?php endforeach;?>
