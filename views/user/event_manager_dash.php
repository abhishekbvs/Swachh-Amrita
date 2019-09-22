<?php 
use yii\helpers\Html;
use yii\widgets\ListView;
$this->title = 'Dashboard - Event Manager';
?>

<div class = "col-md-12">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class = "col-md-3">

</div>
<div class = "col-md-9">
    <div class = "row">
        <h2 class="pull-left" >Created Events</h2> 
        <h2 class="pull-right"><?= Html::a('Create a new Event', ['/event/create'], ['class' => 'btn btn-success']);?></h2>
    </div>
    <div class = "row">
        <?=
        ListView::widget([
            'layout' => "{items}\n{pager}",
            'dataProvider' =>$dataEvents,
            'itemView' => '_event_item',    
        ]);
        ?>
    </div>
</div>
