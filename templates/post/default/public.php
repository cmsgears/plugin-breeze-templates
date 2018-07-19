<?php
$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent = $model->modelContent;

// Config -------------------------

$data			= json_decode(  $model->data );
$settings		= $data->settings ?? null;
$templateClass	= isset( $modelContent->template ) ? "page-default page-{$modelContent->template->slug}" : 'page-default';

// Sidebars -----------------------

$topSidebar		= $settings->topSidebar ?? false;
$bottomSidebar	= $settings->bottomSidebar ?? false;
$leftSidebar	= $settings->leftSidebar ?? false;
$rightSidebar	= $settings->rightSidebar ?? false;

$pageIncludes = Yii::getAlias( '@breeze' ) . '/templates/page/default/includes';

$buffer = "$pageIncludes/buffer.php";
?>
<?php include "$pageIncludes/styles.php"; ?>
<div id="page-<?= $model->slug ?>" class="page page-basic <?= $templateClass ?> page-model-<?= $model->type ?> page-<?= $model->slug ?>" cmt-block="block-half-auto">
	<?php include "$pageIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$pageIncludes/header.php"; ?>
		<?php if( $topSidebar ) { ?>
			<?php include dirname( __FILE__ ) . '/includes/sidebars/top.php'; ?>
		<?php } ?>
		<?php if( $leftSidebar || $rightSidebar ) { ?>
			<div class="page-content-row row content-90 max-cols-100">
				<?php if( $leftSidebar ) { ?>
					<div class="colf colf12x3 colf-sidebar-filler">
						<?php include dirname( __FILE__ ) . '/includes/sidebars/left.php'; ?>
					</div>
				<?php } ?>
				<div class="colf colf-sidebar-filler <?= $leftSidebar && $rightSidebar ? 'colf12x6' : 'colf12x9' ?>">
					<?php include "$pageIncludes/content.php"; ?>
					<?php include "$pageIncludes/comments.php"; ?>
				</div>
				<?php if( $rightSidebar ) { ?>
					<div class="colf colf12x3">
						<?php include dirname( __FILE__ ) . '/includes/sidebars/right.php'; ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="page-content-row row content-90">
				<?php include "$pageIncludes/content.php"; ?>
				<?php include "$pageIncludes/comments.php"; ?>
			</div>
		<?php } ?>
		<?php include "$pageIncludes/blocks.php"; ?>
		<?php include dirname( __FILE__ ) . '/includes/widgets.php'; ?>
		<?php include "$pageIncludes/sidebars.php"; ?>
		<?php if( $bottomSidebar ) { ?>
			<?php include dirname( __FILE__ ) . '/includes/sidebars/bottom.php'; ?>
		<?php } ?>
	</div>
</div>
