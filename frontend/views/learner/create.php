<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>   
   
<?php $form = ActiveForm::begin(); ?>   
   
    <?= $form->field($model, 'product_name'); ?>   
    <?= $form->field($model, 'price'); ?>   
    <?= $form->field($model, 'slug'); ?>   
    <?= $form->field($model, 'sku'); ?>   
      
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>   
   
   <?php ActiveForm::end(); ?> 