<?php
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = "Event - Swachh Amrita"
?>
<h1><?= $dataEvent->title ?></h1>
<p class="pull-right"> From <?= $dataEvent->from_datetime ?> to <?= $dataEvent->to_datetime ?></p>
<p><?= $dataEvent->description ?></p>
<?=
ListView::widget([
    'dataProvider' =>$dataTeams,
    'itemView' => '_team_item',    
]);
?>
