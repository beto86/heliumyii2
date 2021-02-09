<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbUsuario */

$this->title = 'Update Tb Usuario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
