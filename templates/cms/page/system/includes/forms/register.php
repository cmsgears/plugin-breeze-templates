<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();

$termsUrl	= Url::toRoute( [ '/terms' ] );
$privacyUrl	= Url::toRoute( [ '/privacy' ] );
$termsLabel = "I agree to the <a href=\"$termsUrl\">Terms</a> and <a href=\"$privacyUrl\">Privacy Policy";
?>
<div class="<?= $frmClass ?>">
	<div class="h3 align align-center margin margin-bottom-medium">Register</div>
	<?php
		if( $coreProperties->isRegistration() ) {

			if( Yii::$app->session->hasFlash( 'message' ) ) {
	?>
				<p class="margin margin-medium-v reader"><?=Yii::$app->session->getFlash( 'message' )?></p>
	<?php } else { ?>
		<?php $form = ActiveForm::begin( [ 'id' => 'frm-register', 'options' => [ 'class' => 'form' ] ] ); ?>

			<div class="<?= $frmSplit ? 'frm-split-40-60' : null ?>">
				<?php if( isset( $typeMap ) ) { ?>
					<?= $form->field( $formModel, 'type' )->dropDownList( $typeMap, [  'id' => 'reg-user-type', 'class' => 'cmt-select' ] ) ?>
				<?php } ?>
				<?= $form->field( $formModel, 'username' )->textInput( [ 'placeholder' => 'Username*' ] ) ?>
				<?= $form->field( $formModel, 'email' )->textInput( [ 'placeholder' => 'Email*' ] ) ?>
				<?= $form->field( $formModel, 'password' )->passwordInput( [ 'placeholder' => 'Password*' ] ) ?>
				<?= $form->field( $formModel, 'password_repeat' )->passwordInput([ 'placeholder' => 'Confirm Password*' ] ) ?>
				<?= Yii::$app->formDesigner->getIconCheckbox( $form, $formModel, 'terms', null, [ 'label' => $termsLabel ] ) ?>
			</div>

			<div class="row max-cols-50 padding padding-small-v">
				<div class="col col2">
					<label>
						<a href="<?= Url::toRoute( [ '/forgot-password' ] ) ?>">Forgot Password</a>
					</label>
				</div>
				<div class="col col2 align align-right">
					<input class="frm-element-medium" type="submit" value="Register" />
				</div>
			</div>
		<?php ActiveForm::end(); ?>
		<div class="text-with-line">
			<p class="text-content">OR</p>
		</div>
		<div class="align align-center">
			<p>Already registered? <a href="<?= Url::toRoute( [ '/login' ] ) ?>">Click here</a> to login.</p>
		</div>
		<?php
				}
			}
			else {
		?>
				<p class="warning">Site registration is disabled.</p>
		<?php } ?>
</div>
