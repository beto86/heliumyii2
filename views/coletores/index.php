<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColetoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coletores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coletores-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--<?= Html::a('Create Coletores', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome_completo',
            'nome_citacoes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
