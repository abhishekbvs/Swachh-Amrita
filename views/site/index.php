<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Home - Swachh Amrita"
?>
<div class = "h-100 row ab">
        <div class = "col-sm-6 col-xs-12">
            <h1>SWACHH AMRITA</h1>
            <h3>Participate, Clean and Prosper</h3>
            <h5>Come, Join Us. Roll for the events listed and support us to clean our mother earth.</h5>
            <br>
           
            <div class="event-index">


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
                        'to_datetime',
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



        </div>
        <div class ="col-sm-6 col-xs-12">
            <img class="vector-img" src="<?php echo Yii::$app->request->baseUrl; ?>/images/vector.png" type="image/png" />

        </div>
</div>
