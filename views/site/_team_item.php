<?php
use yii\helpers\Html;
use app\models\Registration;
?>

<div class = "col-md-6">
    <div class = "panel panel-success" style="background-color: #E5FFCC	">
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
                    <font size="10">  <?= $model->team_size - Registration::find()->where(['team_id' => $model->id])->count() ?></font>
                    <p> Seats left</p>
                </div>
                <?= Html::a('Register', ['/event/register','id'=>$model->id], ['class' => 'btn btn-success btn-group-justified']);?>
            </div>
        </div>
    </div>
</div>
