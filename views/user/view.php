<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
?>
<div class="user-view">
    <div class="col-md-8">

        <h1>Details of <?= Html::encode($model->name) ?></h1>
    </div>
    <div class="col-md-4">
    <h1>
         <?= Html::a('Change Role', ['/rbac/assignment/view','id'=>$model->id], ['class' => 'btn btn-warning']); ?>
        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])."   " ?>
        
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger ',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            
    </h1>
    </div>
    <div class = "col-md-8">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email_id',
            'name',
            'roll_no',
            'phone_no',
            'role'
        ],
    ]) ?>
    </div>

</div>
