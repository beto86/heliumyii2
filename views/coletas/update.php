<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coletas */

$this->title = 'Update Coletas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coletas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'catalago' => $model->catalago]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coletas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
