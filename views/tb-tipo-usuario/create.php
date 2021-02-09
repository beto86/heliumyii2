<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbTipoUsuario */

$this->title = 'Create Tb Tipo Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Tb Tipo Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-tipo-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
