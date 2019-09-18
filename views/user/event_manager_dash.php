<?php 
use yii\helpers\Html;
use yii\widgets\ListView;
$this->title = 'Dashboard - Event Manager';
?>

<div class = "row">
    <div class = "col-md-9">
    <h1>Created Events</h1> 
    </div>
    <div class = "col-md-3">    
        <?= Html::a('Create a new Event', ['/event/create'], ['class' => 'btn btn-info btn-group-justified']);?>
    </div>
</div>

<?=
ListView::widget([
    'dataProvider' =>$dataEvents,
    'itemView' => '_event_item',    
]);
?>