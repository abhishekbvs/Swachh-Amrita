<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
$user = User::find()->where(['id'=>Yii::$app->user->getId()])->one();

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard - Admin'
?>
<div class="row">
    <div class = "col-md-3">
            <div class = "panel panel-warning"> 
                <div class="panel-heading">
                    <div class ="row" style="padding:0px 10px 0px;">
                        <h4 class="pull-left">Profile</h4>
                        <h4 class="pull-right"><span class="label label-default">Admin</span></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <h4><strong>Name : </strong><?= $user->name ?></h4>
                    <p><strong>Email : </strong><?= $user->email_id ?></p>
                    <p><strong>Phone No. : </strong><?= $user->phone_no ?></p>
                    <p><strong>Roll No. : </strong><?= $user->roll_no ?></p>
                    <div class="row" >
                        <div class = "col-md-5" style="padding:10px">
                            <?= Html::a('Edit Details', ['/user/update','id'=>$user->id], ['class' => 'btn btn-default']);?>
                        </div>

                        <div class = "col-md-7" style="padding:10px">
                            <?= Html::a('Reset Password', ['/user/change','id'=>$user->id], ['class' => 'btn btn-warning']);?>
                        </div>                                    
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-9" style="padding: 0px 30px 0px;">
        <div class="row">
            <h1 class="pull-left">Queries</h1>
            <h1 class="pull-right"><?= Html::a('See all Queries', ['/user/queries'], ['class' => 'btn btn-default']);?></h1>
        </div>
        <br>
        <div class = "row">
            <?php foreach($dataContacts as $model):?>
            <div class="col-md-6">
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
</div>
    
    

