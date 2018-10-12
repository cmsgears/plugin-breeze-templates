<?php
// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\widgets\comment\show\ShowComments;
use cmsgears\widgets\comment\submit\SubmitComment;

$comments	= $commentProperties->isComments() && $cmsProperties->isPostComments() && $model->comments;
$scomments	= isset( $settings->comments ) ? ( $comments && $settings->comments ) : true;
$disqus		= isset( $settings->disqus ) ? ( $comments && $settings->disqus ) : false;
?>
<?php if( $comments & $scomments ) { ?>
	<div class="page-content-buffer page-content-comments">
		<?= SubmitComment::widget([
			'options' => [ 'class' => 'comment-submit' ],
			'ajaxUrl' => "cms/post/submit-comment?slug=$model->slug&type=$model->type",
			'model' => $model,
			'templateDir' => '@breeze/templates/widget/comment/submit'
		]) ?>
		<?= ShowComments::widget([
			'options' => [ 'id' => 'wrap-comments' ],
			'parentId' => $model->id,
			'parentType' => CmsGlobal::TYPE_POST,
			'templateDir' => '@breeze/templates/widget/comment'
		]) ?>
	</div>
<?php } ?>
<?php if( $comments & $disqus ) { ?>
	<div class="page-content-buffer page-content-disqus">
		<div class="h4">Discussion Forum by DISQUS</div><hr/>
		<div class="filler-height"></div>
		<div id="disqus_thread" class="margin margin-small-v"></div>
	</div>
<?php } ?>
