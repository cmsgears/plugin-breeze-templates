<?php
// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\widgets\comment\show\ShowReviews;
use cmsgears\widgets\comment\submit\SubmitReview;

$reviews	= $commentProperties->isComments() && $model->reviews;
$sreviews	= isset( $settings->reviews ) ? ( $reviews && $settings->reviews ) : true;

$reviewSubmitUrl = isset( $reviewSubmitUrl ) ? $reviewSubmitUrl : null;

$parentType = $modelService->getParentType();
$parentType = $parentType == CmsGlobal::TYPE_POST ? 'post' : $parentType;
?>
<?php if( $reviews & $sreviews ) { ?>
	<div class="page-content-buffer page-content-reviews">
		<?php if( !empty( $reviewSubmitUrl ) ) { ?>
			<?= SubmitReview::widget([
				'options' => [ 'class' => 'review-submit' ],
				'ajaxUrl' => "{$reviewSubmitUrl}/submit-review?slug=$model->slug&type=$model->type",
				'model' => $model,
				'templateDir' => '@breeze/templates/widget/native/review/submit'
			])?>
		<?php } ?>
		<?= ShowReviews::widget([
			'options' => [ 'id' => 'wrap-reviews' ],
			'parentId' => $model->id,
			'parentType' => $parentType,
			'templateDir' => '@breeze/templates/widget/native/review'
		]) ?>
	</div>
<?php } ?>
