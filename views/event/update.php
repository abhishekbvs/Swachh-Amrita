<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Update Event'
?>
<div class="event-update">

     <?= $this->render('_form', [
            'model' => $model,
            'modelsTeam' => (empty($modelsTeam)) ? [new Team] : $modelsTeam,
            'modelsVolunteer' => (empty($modelsVolunteer)) ? [[new Volunteer]] : $modelsVolunteer
    ]); ?>

</div>