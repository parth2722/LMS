<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Update Class: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
    <div class="user-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'file')->textInput(['autofocus' => true])->label('file') ?>
        <?= $form->field($model, 'class_name')->textInput(['autofocus' => true])->label('Class name') ?>
        <?= $form->field($model, 'module_id')->textInput(['autofocus' => true])->label('Module id') ?>

        <div class="form-group">
            <?= Html::submitButton('update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>