<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_age')->textInput() ?>

    <?= $form->field($model, 'p_gender')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => 'Select Gender']) ?>

    <?= $form->field($model, 'is_active')->dropDownList([ '0' => 'Inactive', '1'=>'Active', ], ['prompt' => 'Select Status']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
