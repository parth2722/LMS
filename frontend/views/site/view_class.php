<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Class List';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-4">
    <div class="card">
        <div class="card-header"><?= Html::encode($view_class['id']) ?></div>
        <div class="card-body">
            <span class="class-name"><?= Html::encode($view_class['class_name']) ?></span>
            <br>
            <span class="module_id"><?= Html::encode($view_class['module_id']) ?></span>
            <?php $fileType = getFileType($view_class['file_path']); ?>
            <?php if ($fileType === 'image') : ?>
                <img src="<?= Html::encode($view_class['file_path']) ?>" class="card-image" alt="Image" style="max-width: 100%; height: auto;">

            <?php elseif ($fileType === 'video') : ?>
                <video class="card-video" controls style="max-width: 100%;">
                    <source src="<?= Html::encode($view_class['file_path']) ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php elseif ($fileType === 'audio') : ?>
                <audio class="card-audio" controls>
                    <source src="<?= Html::encode($view_class['file_path']) ?>" type="audio/mp3">
                    Your browser does not support the audio tag.
                </audio>
            <?php else : ?>
                <div class="unknown-file">Unknown File Type</div>
            <?php endif; ?>
        </div>
    </div>
</div>