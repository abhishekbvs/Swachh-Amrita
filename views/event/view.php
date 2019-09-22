<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\User;
use yii\bootstrap\Modal;
use yii\helpers\Url;

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
        <div class = "col-md-3 " style="padding-left:30px; padding-right:30px;">
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
     <?php                 

        Modal::begin([
            'header' => '<h4>Team Members</h4>',
            'id'     => 'model',
            'size'   => 'model-lg',
        ]);

        echo "<div id='modalContent'></div>";

        Modal::end();

    ?>
         
    <?php foreach ($modelsTeam as $indexTeam => $modelTeam) :?>
    <div class = "row">
            <div class = "col-md-6">
            <h3 class="pull-left"> Team <?= $indexTeam+1 ?></h3>
            <h3 class="pull-right"><?= Html::button('Show Registered Members', ['id' => 'modalButton', 'value' => Url::to(['event/reg','id'=>$modelTeam->id]), 'class' => 'btn btn-primary']) ?></h3>
                <?= DetailView::widget([
                    'model' => $modelTeam,
                    'attributes' => [
                        'team_name',
                        'place_name',
                        'description',
                        'team_size',
                    ],
                ]) ?>

                

               
            </div> 
            <div class ="col-md-6">
            <h4>Volunteers</h4>
                <?= GridView::widget([
                    'layout' => "{items}\n{pager}",
                    'dataProvider' => $modelsVolunteer[$indexTeam],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => "Volunteer Name",
                            'value' => function ($data){
                                $user = User::find()->select(['name'])->where(['id' => $data->user_id])->one();
                                return $user->name;
                            }
                        ],
                        [
                            'label' => "Phone No",
                            'value' => function ($data){
                                $user = User::find()->select(['phone_no'])->where(['id' => $data->user_id])->one();
                                return $user->phone_no;
                            }
                        ],
                        [
                            'label' => "Role",
                            'value' => function ($data){
                                $list = [ 1 => 'Overall Coordinator', 2 => 'Team Coordinator', 3 =>'Tools Coordinator', 4 => 'Refreshment Coordinator'];
                                return $list[$data->volunteer_type];
                            }
                        ],

                    ],
                ]); ?>
            </div>
    </div>                    
    <?php endforeach; ?>
</div>


