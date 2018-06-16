<?php
// Yii Imports
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\form\BasicFormWidget;
?>
<div class="page-content-buffer">
	<div class="page-form rounded rounded-medium">
		<?php if( Yii::$app->session->hasFlash( 'message' ) ) {  ?>
			<p class="margin margin-medium-v"><?=Yii::$app->session->getFlash( 'message' )?></p>
		<?php } else { ?>
			<?php $activeForm = ActiveForm::begin( [ 'options' => [ 'class' => 'form frm-rounded-all' ] ] ); ?>

				<div class="frm-split-40-60">
					<?= BasicFormWidget::widget([
						'model' => $model, 'form' => $form,
						'activeForm' => $activeForm, 'captchaAction' => '/cms/form/captcha',
						'wrapCaptcha' => true, 'wrapActions' => true
					]) ?>
				</div>

			<?php ActiveForm::end(); ?>
		<?php } ?>
	</div>
</div>
