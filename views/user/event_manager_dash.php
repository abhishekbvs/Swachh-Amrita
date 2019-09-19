<?php 
use yii\helpers\Html;
use yii\widgets\ListView;
$this->title = 'Dashboard - Event Manager';
?>

<div class = "row">
        <h1 class="pull-left"><?= Html::encode($this->title) ?></h1>
        <h1 class="pull-right"><?= Html::a('Create a new Event', ['/event/create'], ['class' => 'btn btn-info']);?></h1>

</div>
<h2>Created Events</h2> 
<?=
ListView::widget([
    'dataProvider' =>$dataEvents,
    'itemView' => '_event_item',    
]);
?>