<?php

use frontend\models\Module;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider; // Make sure to import the ActiveDataProvider class

/** @var yii\web\View $this */

$this->title = 'Module';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="user-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
        <?= Html::a('Class', ['class'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
         
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'module_name',
                'course_id',
              
            ],
        ]);
        ?>
    </div>
</div>