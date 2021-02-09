<?php //criei para teste este formulario
	use yii\helpers\Html;

	$this->title = 'Confirmar registro';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div>
	<p>ˆeVoc enviou as seguintes ¸c˜oinformaes:</p>
	<ul>
		<li><label>Nome</label>: <?= Html::encode($model->nome) ?></li>
		<li><label>E-mail</label>: <?= Html::encode($model->e_mail) ?></li>
	</ul>
</div>
