<?php
use yii\helpers\Html;
use yii\grid\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;

$this->title = "Event - Swachh Amrita"
?>
<?= 
ListView::widget([
    'dataProvider' =>$dataTeams,
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],

    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_team_item',['model' => $model]);    
    },
    'itemOptions' => [
        'tag' => false,
    ],
    'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'nextPageLabel' => 'next',
        'prevPageLabel' => 'previous',
        'maxButtonCount' => 3,
    ],
]);
?>
