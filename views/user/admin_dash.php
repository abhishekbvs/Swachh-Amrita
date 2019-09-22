<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard - Admin'
?>
<div class="user-index">
    <div class =row>
        <h1><?= Html::encode($this->title) ?></h1>
    </div> 
    
    <div class="row">
        <h1 class="pull-left">Queries</h1>
        <h1 class="pull-right"><?= Html::a('See all Queries', ['/user/queries'], ['class' => 'btn btn-default']);?></h1>
    </div>
    <br>
    <div class = "row">
        <?php foreach($dataContacts as $model):?>
        <div class="col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading"><?=$model->name?></div>
                    <div class="panel-body">                 
                        <p><b>Email:</b> <?=$model->email_id?> </p>
                        <p><b>Subject:</b> <?=$model->subject?> </p>
                        <p><b>Message:</b> <?=$model->body?> </p>
                        <?= Html::a('Resolved', ['/rbac/assignment'], ['class' => 'btn btn-success pull-right']);?>
                    </div>
                </div>
        </div>
        <?php endforeach?>
    </div> 

    
    <div class="row">
        <h1 class="pull-left">Users</h1>
        <h1 class="pull-right"><?= Html::a('Assign a User as Event Manager', ['/rbac/assignment'], ['class' => 'btn btn-primary']);?></h1>
    </div>
    <div class = "row">
        <?= GridView::widget([
            'dataProvider' => $dataUsers,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'username',
                'name',
                'roll_no',
                'email_id',
                'phone_no',
                    
                ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}'
                ],
            ],
        ]); ?>
    </div>
</div>
