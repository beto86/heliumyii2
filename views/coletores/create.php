<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coletores */

$this->title = 'Criar Coletores';
$this->params['breadcrumbs'][] = ['label' => 'Coletores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coletores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
