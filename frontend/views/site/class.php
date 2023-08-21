<?php

use frontend\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;


$this->title = 'Class';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<?= Html::a('Home', ['index'], ['class' => 'btn btn-danger']) ?>

<div class="row">
    <?php foreach ($model as $view_class) : ?>
        <?= $this->render('view_class', ['view_class' => $view_class]) ?>
    <?php endforeach; ?>
</div>

<?php
function getFileType($filePath)
{
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);

    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $audioExtensions = ['mp3', 'ogg', 'wav'];
    $videoExtensions = ['mp4', 'webm', 'ogg'];

    if (in_array($extension, $imageExtensions)) {
        return 'image';
    } elseif (in_array($extension, $audioExtensions)) {
        return 'audio';
    } elseif (in_array($extension, $videoExtensions)) {
        return 'video';
    } else {
        return 'unknown';
    }
}
?>