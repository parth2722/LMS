<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\helpers\Json;
use backend\modules\super\Module as SuperModule;
use frontend\models\Classs; // Add this line


use frontend\models\Course;
use frontend\models\Module as ModelsModule;
use frontend\models\Module;
use Masterminds\HTML5\Parser\FileInputStream;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


$this->title = 'Add Class';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->registerJsFile('@web/js/jquery.min.js', ['depends' => [\yii\web\JqueryAsset::class]]); ?>
<div class="site-signup">
    <div class="container">
        <div class="col-lg-5">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'class_name')->textInput(['autofocus' => true])->label('Class name') ?>
           

            <?= $form->field($model, 'course_id')->dropDownList($courseList, ['prompt' => 'Select a course'])->label('Course') ?>
 <?= $form->field($model, 'module_id')->dropDownList($moduleList, ['prompt' => 'Select a module'])->label('Module') ?>
            <?= $form->field($model, 'file')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Add', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
$js = <<< JS
$(document).ready(function() {
    $('#classs-course_id').on('change', function() {
        var courseId = $(this).val();
        
        if (courseId !== '') {
            $.ajax({
                url: 'http://admin.learning.com/index.php?r=classs/get-modules', // Correct AJAX URL
                data: {courseId: courseId},
                dataType: 'json',
                success: function(data){
                    console.log(data.options);
                    $('#classs-module_id').html(data.options).prop('disabled', false);
                }
            });
        } else {
            $('#classs-module_id').html('<option value="">Select a course first</option>');
        }
    });
});
JS;
$this->registerJs($js);
?>