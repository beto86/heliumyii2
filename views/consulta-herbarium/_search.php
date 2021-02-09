<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ColetasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coletas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'catalago') ?>

    <?= $form->field($model, 'coletores_id') ?>

    <?= $form->field($model, 'num_coleta') ?>

    <?= $form->field($model, 'comentarios') ?>

    <?php  echo $form->field($model, 'data_coleta') ?>

    <?php  echo $form->field($model, 'habitat') ?>

    <?php  echo $form->field($model, 'localidade_id') ?>

    <?php  echo $form->field($model, 'cidade_id') ?>

    <?php  echo $form->field($model, 'plant_reino') ?>

    <?php  echo $form->field($model, 'plant_fila') ?>

    <?php  echo $form->field($model, 'plant_familia') ?>

    <?php  echo $form->field($model, 'plant_genero') ?>

    <?php // echo $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
