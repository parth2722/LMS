<?php

use frontend\models\Classs;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;


/** @var yii\web\View $this */

$this->title = 'Class';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="user-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Create Class', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?php Pjax::begin(['id' => 'products-pjax']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'file',
                'class_name',
                'module_id',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Classs $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
            'pager' => [
                'class' => LinkPager::class,
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>