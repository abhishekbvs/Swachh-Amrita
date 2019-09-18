<?php
use yii\helpers\Html;
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
                    <font size="10">100</font>
                    <p> Total Seats</p>
            </div>
            <?= Html::a('DETAIL VIEW', ['/event/view','id'=>$model->id], ['class' => 'btn btn-default btn-group-justified']);?>
        </div>

        <div class = "col-md-2">
            <div class = "panel panel-primary"  style="text-align:center; padding:2px;">
                    <font size="10"> 50 </font>
                    <p>Seats left</p>
            </div>
            <?= Html::a('REGISTRATIONS', ['site/event','id'=>$model->id], ['class' => 'btn btn-default btn-group-justified']);?>
        </div>
        
        <div class = "col-md-2">
            <div class = "row" style="padding:2px;">
                <?= Html::a('PUBLISH EVENT', ['/event/publish','id'=>$model->id], ['class' => 'btn btn-success btn-group-justified']);?>
            </div>
            <div class = "row" style="padding:2px;">
                <?= Html::a('CLOSE REG', ['/event/close','id'=>$model->id], ['class' => 'btn btn-danger btn-group-justified']);?>
            </div>
            <div class = "row" style="padding:2px;">
                <?= Html::a('END EVENT', ['/event/end','id'=>$model->id], ['class' => 'btn btn-warning btn-group-justified']);?>
            </div>
            <div class = "row" style="padding:2px;">
                <?= Html::a('UPDATE EVENT', ['/event/update','id'=>$model->id], ['class' => 'btn btn-primary btn-group-justified']);?>
            </div>
        </div>
    </div>
</div>