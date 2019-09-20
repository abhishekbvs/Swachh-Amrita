<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Home - Swachh Amrita"
?>
<div class = "ab">
        <div class = "col-md-6">
            <h1 id = "title"> Swachh Amrita</h1>
            <h4 id = "tag">PARTICIPATE, CLEAN & FLOURISH</h4>
            <h5 id = "desc">Come, Join Us. Roll for the events listed and support us to clean our mother earth.</h5>
            <br>
           
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'label'=>'Event',
                            'format'=>'raw',
                            'value' => function ($data) {
                                return Html::a($data['title'],['site/event','id'=>$data['id']]);
                           },
                           'contentOptions'=>[ 'style'=>'height: 50px'],

                        ],
                        'from_datetime',
                        [
                            'label' => 'Registrations',
                            'format'=>'raw',
                            'value' => function ($data) {
                                    if($data['close_reg']){
                                        return Html::a('CLOSED', ['site/event','id'=>$data['id']], ['class' => 'btn btn-group-justified btn-danger']);
                                    }
                                    else{
                                       return Html::a('OPEN', ['site/event','id'=>$data['id']], ['class' => 'btn btn-group-justified btn-success']);
                                    }
                            },
                            'contentOptions'=>[ 'style'=>'width: 50px'],
                        ],
                    ],
                ]); ?>

        </div>
        <div class ="col-md-6">
            <img class="vector-img" src="<?php echo Yii::$app->request->baseUrl; ?>/images/vector.png" type="image/png" />

        </div>
</div>
