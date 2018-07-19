<?php
// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\widgets\comment\show\ShowComments;
use cmsgears\widgets\comment\submit\SubmitComment;
?>

<?php if( $commentProperties->isComments() && $cmsProperties->isPostComments() && $model->comments ) { ?>
	<div class="page-content-buffer page-content-comments">
		<?= ShowComments::widget([
			'options' => [ 'id' => 'wrap-comments' ],
			'parentId' => $model->id,
			'parentType' => CmsGlobal::TYPE_POST,
			'templateDir' => '@breeze/templates/page/default/comment'
		]) ?>
		<?= SubmitComment::widget([
			'options' => [ 'class' => 'comment-submit' ],
			'ajaxUrl' => "cms/post/submit-comment?slug=$model->slug&type=$model->type",
			'model' => $model,
			'templateDir' => '@breeze/templates/page/default/comment/submit'
		]) ?>
	</div>
<?php } ?>
