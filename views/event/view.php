<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title)?></h1>
    <p>Detailed view of the Event</p>
    <div class = "row">
        <div class="col-md-9">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'title',
                'description',
                'from_datetime',
                'to_datetime',
                [
                    'label' => "Event Published",
                    'value' => function ($data){
                        return $data->publish ? 'Yes' : 'No';
                    }
                ],
                [
                    'label' => "Registrations Closed",
                    'value' => function ($data){
                        return $data->publish ? 'Yes' : 'No';
                    }
                ],
                [
                    'label' => "Event Ended",
                    'value' => function ($data){
                        return $data->publish ? 'Yes' : 'No';
                    }
                ],
            ],
        ]) ?>
        </div>
        <div class = "col-md-3">
                <div class = "row">
                <?= Html::a('Registrations', ['site/event','id'=>$model->id], ['class' => 'btn btn-default btn-group-justified']);?>
                </div>
                <div class = "row" style="padding-top:5px;">
                    <?= $model->publish ?(Html::a('Unpublish Event', ['/event/publish','id'=>$model->id], ['class' => 'btn btn-success btn-group-justified'])):( 
                                Html::a('Publish Event', ['/event/publish','id'=>$model->id], ['class' => 'btn btn-success btn-group-justified']));?>
                </div>
                <div class = "row" style="padding-top:5px;">
                    <?= $model->close_reg ?(Html::a('Open Registrations', ['/event/close-reg','id'=>$model->id], ['class' => 'btn btn-danger btn-group-justified'])):(
                                Html::a('Close Registrations', ['/event/close-reg','id'=>$model->id], ['class' => 'btn btn-danger btn-group-justified']));?>
                </div>
                <div class = "row" style="padding-top:5px;">
                    <?= $model->end_event ? (Html::a('Reopen Event', ['/event/end','id'=>$model->id], ['class' => 'btn btn-warning btn-group-justified'])):(
                                Html::a('End Event', ['/event/end','id'=>$model->id], ['class' => 'btn btn-warning btn-group-justified']));?>
                </div>
                <div class = "row" style="padding-top:5px;">
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-group-justified']) ?>
                </div>
                <div class = "row" style="padding-top:5px;">
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger btn-group-justified',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
        </div>
     </div>



</div>