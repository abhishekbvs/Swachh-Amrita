<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title)?></h1>
    <p class="pull-left">Detailed view of the Event</p>
    <p class="pull-right">
        <?= Html::a('Registrations', ['site/event','id'=>$model->id], ['class' => 'btn btn-default']);?>
        <?= $model->publish ?(Html::a('Unpublish Event', ['/event/publish','id'=>$model->id], ['class' => 'btn btn-success'])):( 
                    Html::a('Publish Event', ['/event/publish','id'=>$model->id], ['class' => 'btn btn-success']));?>
         <?= $model->close_reg ?(Html::a('Open Registrations', ['/event/close-reg','id'=>$model->id], ['class' => 'btn btn-danger'])):(
                    Html::a('Close Registrations', ['/event/close-reg','id'=>$model->id], ['class' => 'btn btn-danger']));?>
        <?= $model->end_event ? (Html::a('Reopen Event', ['/event/end','id'=>$model->id], ['class' => 'btn btn-warning'])):(
                    Html::a('End Event', ['/event/end','id'=>$model->id], ['class' => 'btn btn-warning']));?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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