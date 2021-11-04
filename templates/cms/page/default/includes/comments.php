<?php
// CMG Imports
use cmsgears\widgets\comment\show\ShowComments;
use cmsgears\widgets\comment\submit\SubmitComment;

$comments	= $commentProperties->isComments() && $cmsProperties->isPostComments() && $model->comments;
$scomments	= isset( $settings->comments ) ? ( $comments && $settings->comments ) : true;
$disqus		= isset( $settings->disqus ) ? ( $comments && $settings->disqus ) : false;

$commentSubmitUrl = isset( $commentSubmitUrl ) ? $commentSubmitUrl : null;
?>
<?php if( $comments & $scomments ) { ?>
	<div class="page-content-buffer page-content-comments">
		<?php if( isset( $commentSubmitUrl ) ) { ?>
			<?= SubmitComment::widget([
				'options' => [ 'class' => 'comment-submit' ],
				'ajaxUrl' => $commentSubmitUrl,
				'model' => $model,
				'templateDir' => '@breeze/templates/widget/native/comment/submit'
			])?>
		<?php } ?>
		<?= ShowComments::widget([
			'options' => [ 'id' => 'wrap-comments' ],
			'parentId' => $model->id,
			'parentType' => $parentType,
			'templateDir' => '@breeze/templates/widget/native/comment'
		])?>
	</div>
<?php } ?>
<?php if( $comments & $disqus ) { ?>
	<div class="page-content-buffer page-content-disqus">
		<div class="h4">Discussion Forum by DISQUS</div><hr/>
		<div class="filler-height"></div>
		<div id="disqus_thread" class="margin margin-small-v"></div>
	</div>
<?php } ?>
