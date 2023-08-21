<?php

use frontend\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;


$this->title = 'Module';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>


<div class="row">
    <?php foreach ($model as $view_module) : ?>
        <?= $this->render('view_module', ['view_module' => $view_module]) ?>
    <?php endforeach; ?>
</div>