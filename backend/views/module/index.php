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
            <?= Html::a('Create Module', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'module_name',
                'course_id',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Module $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]);
        ?>
    </div>
</div>