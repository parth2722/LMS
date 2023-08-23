<?php


use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin()?>

<?= $form->field($model,'old_password')->passwordInput()?>
<?= $form->field($model,'new_password')->passwordInput() ?>

<?= Html::submitButton('Change Password',['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end()?>