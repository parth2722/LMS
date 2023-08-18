<?php
use frontend\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
?>

<div class="container">
<h1>course </h1>

<div class="user-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
        <?= Html::a('module', ['module'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php  //echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?php Pjax::begin(['id' => 'products-pjax']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'course_name',
            ],
            'pager' => [
                'class' => LinkPager::class,
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>