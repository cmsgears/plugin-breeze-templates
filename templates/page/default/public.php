<?php
$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent = $model->modelContent;

// Config -------------------------

$data			= json_decode(  $model->data );
$settings		= $data->settings ?? null;
$templateClass	= isset( $modelContent->template ) ? "page-{$modelContent->template->slug}" : 'page-default';

// Sidebars -----------------------

$topSidebar		= $settings->topSidebar ?? false;
$bottomSidebar	= $settings->bottomSidebar ?? false;
$leftSidebar	= $settings->leftSidebar ?? false;
$rightSidebar	= $settings->rightSidebar ?? false;
?>
<?php include dirname( __FILE__ ) . '/includes/styles.php'; ?>
<div id="page-<?= $model->slug ?>" class="page page-basic <?= $templateClass ?> page-model-<?= $model->type ?> page-<?= $model->slug ?>" cmt-block="block-full-auto">
	<?php include dirname( __FILE__ ) . '/includes/background.php'; ?>
	<div class="page-content-wrap">
		<?php include dirname( __FILE__ ) . '/includes/header.php'; ?>
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
					<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
					<?php include dirname( __FILE__ ) . '/includes/comments.php'; ?>
				</div>
				<?php if( $rightSidebar ) { ?>
					<div class="colf colf12x3">
						<?php include dirname( __FILE__ ) . '/includes/sidebars/right.php'; ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="page-content-row row content-90">
				<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
				<?php include dirname( __FILE__ ) . '/includes/comments.php'; ?>
			</div>
		<?php } ?>
		<?php include dirname( __FILE__ ) . '/includes/blocks.php'; ?>
		<?php include dirname( __FILE__ ) . '/includes/widgets.php'; ?>
		<?php include dirname( __FILE__ ) . '/includes/sidebars.php'; ?>
		<?php if( $bottomSidebar ) { ?>
			<?php include dirname( __FILE__ ) . '/includes/sidebars/bottom.php'; ?>
		<?php } ?>
	</div>
</div>
