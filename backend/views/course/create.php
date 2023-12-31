<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$this->title = 'Add Course';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="container">

        <div class="col-lg-5">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'course_name')->textInput(['autofocus' => true])->label('Course name') ?>
            <div class="form-group">
                <?= Html::submitButton('Add', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>