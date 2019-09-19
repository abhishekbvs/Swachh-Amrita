<?php 

?>
<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard - Admin'
?>
<div class="user-index">
    <div class="row">
        <h1 class="pull-left"><?= Html::encode($this->title) ?></h1>
        <h1 class="pull-right"><?= Html::a('Assign a User as Event Manager', ['/rbac/assignment'], ['class' => 'btn btn-warning']);?></h1>
    </div>
    <h2>Users</h2>
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
