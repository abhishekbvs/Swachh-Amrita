<?php 

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Event;
use app\models\Team;
use app\models\User;

$user = User::find()->where(['id'=>Yii::$app->user->getId()])->one();
$this->title = 'Dashboard - Participant'
?>

<div class = row>   
    <div class = "col-md-3">
        <div class = "panel panel-warning"> 
            <div class="panel-heading">
                <div class ="row" style="padding:0px 10px 0px;">
                    <h4 class="pull-left">Profile</h4>
                    <h4 class="pull-right"><span class="label label-default">Volunteer</span></h4>
                </div>
            </div>
            <div class="panel-body">
                <h4><strong> Name : </strong><?= $user->name ?></h4>
                <p><strong> Email : </strong><?= $user->email_id ?></p>
                <p><strong> Phone No. : </strong><?= $user->phone_no ?></p>
                <p><strong> Roll No. : </strong><?= $user->roll_no ?></p>
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

    <div class = "col-md-9">
        <h2>Assigned Teams</h2>    
        <br>  
    </div>
</div>


   
    
