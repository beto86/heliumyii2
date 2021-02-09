<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coletas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coletas-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'coletores_id')->textInput() ?>

    <?= $form->field($model, 'catalago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_coleta')->textInput() ?>

    <?= $form->field($model, 'comentarios')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_coleta')->textInput() ?>

    <?= $form->field($model, 'habitat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localidade_id')->textInput() ?>

    <?= $form->field($model, 'cidade_id')->textInput() ?>

    <?= $form->field($model, 'plant_reino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plant_fila')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plant_familia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plant_genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
