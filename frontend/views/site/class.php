<?php

use frontend\models\Classs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/** @var yii\web\View $this */

$this->title = 'Class';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="user-index">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => Classs::find(), // Fetch all records from the Classs model
        ]);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'file_path',
                'class_name',
                'module_id',


                [
                    'attribute' => 'image',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $imageUrl = Url::to(['uploads/' . $model->file_path]); // Adjust this based on your image path
                        return Html::img($imageUrl, ['alt' => '', 'style' => 'max-width: 100px;']);
                    },
                ],

                // ...
                [
                    'attribute' => 'audio',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $audioUrl = Url::to(['uploads/' . $model->file_path]); // Adjust this based on your audio path
                        return '<audio controls style="max-width: 100px;"><source src="' . $audioUrl . '" type="audio/mpeg"></audio>';
                    },
                ],
                [
                    'attribute' => 'video',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $videoUrl = Url::to(['uploads/' . $model->file_path]); // Adjust this based on your video path
                        return '<video controls style="max-width: 100px;"><source src="' . $videoUrl . '" type="video/mp4"></video>';
                    },
                ],
                // ...

                // ...

            ],
        ]);
        ?>
    </div>
</div>