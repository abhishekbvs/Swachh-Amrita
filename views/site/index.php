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
            <br>
            <div class="event-index">


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'label'=>'Event',
                            'format'=>'raw',
                            'value' => function ($data) {
                                return Html::a($data['title'],['event/'.$data['id']]);
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
                                        return Html::a('CLOSE', ['event/'.$data['id']], ['class' => 'btn btn-danger', 'disabled' => 'disabled']);
                                    }
                                    else{
                                       return Html::a('OPEN', ['event/'.$data['id']], ['class' => 'btn btn-success']);
                                    }
                            },
                        ],
                    ],
                ]); ?>


            </div>



        </div>
        <div class ="col-sm-6 col-xs-12">
            <img class="vector-img" src="<?php echo Yii::$app->request->baseUrl; ?>/images/vector.png" type="image/png" />

        </div>
</div>
