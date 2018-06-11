<?php
$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent = $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= $data->settings ?? null;
?>
<?php include dirname( __FILE__ ) . '/includes/styles.php'; ?>
<div class="page page-banner page-model-<?= $model->type ?>" cmt-block="block-full-auto">
	<?php include dirname( __FILE__ ) . '/includes/background.php'; ?>
	<div class="page-content-wrap">
		<?php include dirname( __FILE__ ) . '/includes/header.php'; ?>
		<div class="row content-90">
			<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
		</div>
		<?php include dirname( __FILE__ ) . '/includes/comments.php'; ?>
		<?php include dirname( __FILE__ ) . '/includes/blocks.php'; ?>
		<?php include dirname( __FILE__ ) . '/includes/widgets.php'; ?>
	</div>
</div>
