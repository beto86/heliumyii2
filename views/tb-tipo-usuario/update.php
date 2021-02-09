<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbTipoUsuario */

$this->title = 'Update Tb Tipo Usuario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Tipo Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-tipo-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
