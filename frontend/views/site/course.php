<?php

use frontend\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;


$this->title = 'Course';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>


<div class="row">
    <?php foreach ($model as $view_course) : ?>
        <?= $this->render('view_course', ['view_course' => $view_course]) ?>
    <?php endforeach; ?>
</div>