<?php //criei para teste este formulario
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'Registro';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div>
	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'nome') ?>
	<?= $form->field($model, 'e_mail') ?>
	<div class="form-group">
		<?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>