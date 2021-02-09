<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ColetasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coletas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coletas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--<?= Html::a('Create Coletas', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'attribute'=>'catalago',
            //'coletores_id',//nome do coletor(tabela coletores)
            [
                'label' => 'coletores',
                'attribute' => 'coletores_id',
                //'value' => 'coletores.nome_completo',
                'value' => function($model){
                    $coletores = app\models\Coletores::find()->where(['id'=>$model->id])->one();
                    return $coletores->nome_completo;
                }
            ],
            'num_coleta',
            'comentarios',
            'data_coleta',
            'habitat',
            //'localidade_id',//nome do local(tabela localidade)
            [
                'label' => 'localidade',
                'attribute' => 'localidade_id',
                'value' => 'localidade.local',
                /*'value' => function($model){
                    $localidade = app\models\Localidade::find()->where(['id'=>$model->id])->one();
                    return $localidade->local;
                }*/
            ],
            [
                'label' => 'Descrição Local',
                'attribute' => 'localidade_id',
                'value' => 'localidade.desc_especifica',
            ],
            //'cidade_id',//nome cidade(tabela cidade)
            [
                'label' => 'cidade',
                'attribute' => 'cidade_id',
                'value' => 'cidade.nome',
                /*'value' => function($model){
                    $cidade = app\models\Cidade::find()->where(['id'=>$model->id])->one();
                    return $cidade->nome;
                }*/
            ],

            'plant_reino',
            'plant_fila',
            'plant_familia',
            'plant_genero',
            //'status:boolean',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model){
                    return ($model->status == 1) ? "<span class='label label-success'>Ativo</span>" : "<span class='label label-danger'>Inativo</span>";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
