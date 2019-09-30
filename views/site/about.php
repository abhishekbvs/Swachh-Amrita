<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
// $this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="row">
    <div class="col-md-6">
        <p class="text-justify">
            Hello people, Thank You for being here. We really appreciate you for joining us to clean our mother earth.
            The main aim of this project is to keep our environment clean by bringing more awareness among the people about the disposal of waste. 
            Clean-up drives are conducted for cleaning the environment and for bringing more awareness. So we came up with a great idea for making 
            clean-up drives more productive and to engage people at large scale.</p>

            <p class= "text-justify"> This is a web application for clean-up drives which enables event 
            creation and registrations in a very easy way. Are you interested in sponsoring, conducting or volunteering for an event. Then 
            <a href="<?=Yii::$app->request->baseUrl?>\index.php\?r=site%2Fcontact">contact</a> us right now. If you code and wish to contribute. Then, 
            you are in the right place, this is a free and open source software, go through the <a href="https://swachh-amrita.gitbook.io/">documentation</a> 
            to know more about the key features of the application and start your contributions today 
            <a href="https://github.com/abhishekbvs/swachh-amrita">GitHub</a>. <strong> Thank You :) </strong>
        </p>
    </div>
        
    
</div>
