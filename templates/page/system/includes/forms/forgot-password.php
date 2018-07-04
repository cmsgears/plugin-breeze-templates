<?php
// Yii Imports
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="page-form rounded rounded-medium">
	<div class="h3 align align-center margin margin-bottom-medium">Forgot Password</div>
	<?php if( Yii::$app->session->hasFlash( 'message' ) ) {  ?>
		<p class="margin margin-medium-v reader"><?=Yii::$app->session->getFlash( 'message' )?></p>
	<?php } else { ?>
		<?php $form = ActiveForm::begin( [ 'id' => 'frm-password', 'options' => [ 'class' => 'form' ] ] ); ?>

			<div class="frm-split-40-60">
				<?= $form->field( $formModel, 'email' )->textInput( [ 'placeholder' => 'Email' ] ) ?>
			</div>

			<div class="row max-cols-50 padding padding-small-v">
				<div class="col col2">
					<label>
						<a href="<?= Url::toRoute( [ '/login' ] ) ?>">Login ?</a>
					</label>
				</div>
				<div class="col col2 align align-right">
					<input class="element-medium" type="submit" value="Submit" />
				</div>
			</div>
		<?php ActiveForm::end(); ?>
	<?php } ?>
</div>
