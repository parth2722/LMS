<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<head>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<div class="col-md-4">
    <div class="card">
        <a href="<?=Url::toRoute(['/module','id'=>$view_course->id])?>">
        <div class="card-header"><?= Html::encode($view_course['id']) ?></div>
        <h5><?= $view_course->course_name ?></h5>
        <h6><?= $view_course->created_at ?></h6>
        </a>
    </div>

</div>