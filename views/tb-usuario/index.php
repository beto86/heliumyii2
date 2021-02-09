<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        

       <!-- <?= Html::a('Create Tb Usuario', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nome',
            'sobrenome',
            //'username',
            //'senha',
            //'link_lattes',
            'tb_tipo_usuario_id',
            /*[
                'attribute' => 'tb_tipo_usuario_id',
                'value' => 'tb_tipo_usuario.descricao',
                 'value' => function($model){
                    $tipoUsuario = app\models\TbTipoUsuario::find()->where(['id'=>$model->id])->one();
                    return $tipoUsuario->descricao;
                }
            ],*/
            //'status:boolean',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model){
                    return ($model->status == 1) ? "<span class='label label-success'>Ativo</span>" : "<span class='label label-danger'>Inativo</span>";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'], //aqui mostra as açoes
        ],
    ]); 
    ?>


</div>
