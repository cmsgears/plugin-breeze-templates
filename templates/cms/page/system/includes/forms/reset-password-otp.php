<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\widgets\ActiveForm;
?>
<div class="<?= $frmClass ?>">
	<div class="h3 align align-center margin margin-bottom-medium">Reset Password</div>
	<?php if( Yii::$app->session->hasFlash( 'message' ) ) {  ?>
		<p class="margin margin-medium-v reader"><?= Yii::$app->session->getFlash( 'message' ) ?></p>
	<?php } else if( Yii::$app->smsManager->isOTP() ) { ?>
		<?php $form = ActiveForm::begin( [ 'id' => 'frm-password', 'options' => [ 'class' => 'form' ] ] ); ?>

			<div class="<?= $frmSplit ? 'frm-split-40-60' : null ?>">
				<?php if( empty( $mobile ) || !empty( $merror ) ) { ?>
					<div class="form-group">
						<label>Registered Mobile</label>
						<?php if( $intlMobile ) { ?>
							<input type="text" name="mobile" placeholder="Mobile" value="<?= $mobile ?>" />
						<?php } else { ?>
							<input type="text" class="intl-tel-field intl-tel-field-mb required" name="tmobile" placeholder="Mobile Number" autocomplete="off" />
							<input type="hidden" class="intl-tel-number" name="mobile" value="<?= $mobile ?>" />
						<?php } ?>
						<?php if( !empty( $merror ) ) { ?>
							<p class="error"><?= $merror ?></p>
						<?php } ?>
					</div>
				<?php } else { ?>
					<input type="hidden" name="mobile" value="<?= $mobile ?>" />
					<input type="hidden" name="status" value="<?= $status ?>" />
					<?= $form->field( $formModel, 'otp' )->textInput( [ 'placeholder' => 'OTP' ] ) ?>
					<?= $form->field( $formModel, 'password' )->passwordInput( [ 'placeholder' => 'Password' ] ) ?>
					<?= $form->field( $formModel, 'password_repeat' )->passwordInput( [ 'placeholder' => 'Repeat Password' ] ) ?>
				<?php } ?>
			</div>

			<div class="row max-cols-50 padding padding-small-v">
				<div class="col col2">
					<label>
						<a href="<?= Url::toRoute( [ '/login' ] ) ?>">Login</a>
					</label>
				</div>
				<div class="col col2 align align-right">
					<input class="frm-element-medium" type="submit" value="Submit" />
				</div>
			</div>
		<?php ActiveForm::end(); ?>
	<?php } else { ?>
		<div class="align align-center">
			<p>OTP facility is not available at the moment. <a href="<?= Url::toRoute( [ '/forgot-password' ] ) ?>">Click here</a> to reset password using email.</p>
		</div>
	<?php } ?>
</div>
