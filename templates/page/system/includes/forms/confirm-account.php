<div class="page-form rounded rounded-medium">
	<?php if( $confirmed ) {  ?>
		<div class="h3 align align-center margin margin-bottom-medium">Account Confirmed</div>
		<div class="row">
			<div class="align align-center">
				<span class="inline-block circled circled1 circled-medium color color-tertiary">
					<i class="cmti cmti-5x cmti-check valign-center"></i>
				</span>
			</div>
			<p class="margin margin-medium-v"><?= Yii::$app->session->getFlash( 'message' ) ?></p>
		</div>
	<?php } else { ?>
		<div class="h3 align align-center margin margin-bottom-medium">Account Confirmation</div>
		<div class="row">
			<div class="align align-center">
				<span class="inline-block circled circled1 circled-medium color color-tertiary">
					<i class="cmti cmti-5x cmti-close valign-center"></i>
				</span>
			</div>
			<p class="margin margin-medium-v reader"><?= Yii::$app->session->getFlash( 'message' ) ?></p>
		</div>
	<?php } ?>
</div>
