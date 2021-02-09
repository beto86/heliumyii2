<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coletas */

$this->title = 'Criar Coletas';
$this->params['breadcrumbs'][] = ['label' => 'Coletas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coletas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
