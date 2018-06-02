<?php
$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent	= $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= $data->settings ?? null;

$pageIncludes = dirname( __DIR__ ) . '/pages/includes';
?>
<div class="page page-banner page-model-<?= $model->type ?>" cmt-block="block-full-auto">
	<?php include "$pageIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$pageIncludes/header.php"; ?>
		<?php include "$pageIncludes/content.php"; ?>
		<?php include "$pageIncludes/blocks.php"; ?>
		<?php include dirname( __FILE__ ) . '/includes/widgets.php'; ?>
	</div>
</div>
