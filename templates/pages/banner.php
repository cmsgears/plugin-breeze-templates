<?php
$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent	= $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= $data->settings ?? null;
?>
<div class="page page-banner page-model-<?= $model->type ?>" cmt-block="block-full-auto">
	<?php include dirname( __FILE__ ) . '/includes/background.php'; ?>
	<div class="page-content-wrap">
		<?php include dirname( __FILE__ ) . '/includes/header.php'; ?>
		<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
		<?php include dirname( __FILE__ ) . '/includes/blocks.php'; ?>
		<?php include dirname( __FILE__ ) . '/includes/widgets.php'; ?>
	</div>
</div>
