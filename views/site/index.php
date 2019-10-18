<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Home - Swachh Amrita"
?>
<!-- <div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>

    <div class="carousel-inner" >
        <div class="item active">
            <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/cleanup-drive1.jpg" alt="">
        </div>

        <div class="item">
        <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/cleanup-drive2.jpg" alt="Chicago">
        </div>

        <div class="item">
        <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/cleanup-drive3.jpg" alt="New York">
        </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div> -->
<div class = "row">
        <div class = "col-md-6">
            <h1 id = "title"> Swachh Amrita</h1>
            <h4 id = "tag">PARTICIPATE, CLEAN & FLOURISH</h4>
            <h5 id = "desc">Come, Join Us. Roll for the events listed and support us to clean our mother earth.</h5>
            <br>
           
            <?= GridView::widget([
                    'layout' => "{items}\n{pager}",
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'label'=>'Event',
                            'format'=>'raw',
                            'value' => function ($data) {
                                return Html::a($data['title'],['site/event','id'=>$data['id']]);
                           },
                        ],
                        'from_datetime',
                        [
                            'label' => 'Registrations',
                            'format'=>'raw',
                            'value' => function ($data) {
                                    if($data['close_reg']){
                                        return  '<h4><span class="label label-danger">CLOSED</span></h4>';
                                    }
                                    else{
                                       return '<h4><span class="label label-success">OPEN</span></h4>';
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