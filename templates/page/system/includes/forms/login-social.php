<?php
// Yii Imports
use yii\helpers\Url;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\social\connect\widgets\SnsLoginWidget;

$coreProperties = $this->context->getCoreProperties();
?>
<div class="page-form rounded rounded-medium">
	<div class="h3 align align-center margin margin-bottom-medium">Login With</div>
	<?php
		if( $coreProperties->isLogin() ) {
	?>
	<?= SnsLoginWidget::widget() ?>
	<div class="filler-height"></div>
	<div class="text-with-line">
		<p class="text-content">OR</p>
	</div>
	<?php $form = ActiveForm::begin( [ 'id' => 'frm-login', 'options' => [ 'class' => 'form' ] ] ); ?>

		<div class="<?= $frmSplit ? 'frm-split-40-60' : null ?>">
			<?= $form->field( $formModel, 'email' )->textInput( [ 'placeholder' => 'Email/Username' ] )->label( 'Email/Username' ) ?>
			<?= $form->field( $formModel, 'password' )->passwordInput( [ 'placeholder' => 'Password' ] ) ?>
		</div>

		<div class="row max-cols-50 padding padding-small-v">
			<div class="col col2">
				<label>
					<a href="<?= Url::toRoute( [ '/forgot-password' ] ) ?>">Forgotton Password ?</a>
				</label>
			</div>
			<div class="col col2 align align-right">
				<input class="element-medium" type="submit" value="Login" />
			</div>
		</div>
	<?php ActiveForm::end(); ?>
	<div class="text-with-line">
		<p class="text-content">OR</p>
	</div>
	<div class="align align-center">
		<p>Don't have an Account ? <a href="<?= Url::toRoute( [ $registerUrl ] ) ?>">Click here</a> to register.</p>
	</div>
	<?php
		}
		else {
	?>
			<p class="warning">Site login is disabled.</p>
	<?php } ?>
</div>
