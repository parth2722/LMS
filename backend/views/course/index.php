<?php

use frontend\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var \frontend\models\CourseSearch $searchModel */

$this->title = 'Course';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="user-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php  //echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?php Pjax::begin(['id' => 'products-pjax']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'course_name',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Course $model, $key, $index, $column) {
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