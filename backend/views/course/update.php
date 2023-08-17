<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Update Course: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
    <div class="user-update">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'course_name')->textInput(['autofocus' => true])->label('Course name') ?>
        <div class="form-group">
            <?= Html::submitButton('update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>