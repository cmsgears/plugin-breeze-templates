<?php
$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent = $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= $data->settings ?? null;

// Sidebars -----------------------

$topSidebar			= $settings->topSidebar ?? false;
$topSidebarSlugs	= isset( $settings ) && !empty( $settings->topSidebarSlugs ) ? $settings->topSidebarSlugs : null;
$bottomSidebar		= $settings->bottomSidebar ?? false;
$bottomSidebarSlugs	= isset( $settings ) && !empty( $settings->bottomSidebarSlugs ) ? $settings->bottomSidebarSlugs : null;
$leftSidebar		= $settings->leftSidebar ?? false;
$leftSidebarSlug	= isset( $settings ) && !empty( $settings->leftSidebarSlug ) ? $settings->leftSidebarSlug : null;
$rightSidebar		= $settings->rightSidebar ?? false;
$rightSidebarSlug	= isset( $settings ) && !empty( $settings->rightSidebarSlug ) ? $settings->rightSidebarSlug : null;

$pageIncludes = Yii::getAlias( '@cmsgears/plugin-btemplates/templates/pages/banner' ) . '/includes';
?>
<?php include "$pageIncludes/styles.php"; ?>
<div class="page page-banner page-model-<?= $model->type ?>" cmt-block="block-full-auto">
	<?php include "$pageIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$pageIncludes/header.php"; ?>
		<?php if( $leftSidebar || $rightSidebar ) { ?>
			<div class="row content-90 max-cols-100">
				<?php if( $leftSidebar ) { ?>
					<div class="colf colf12x3 colf-sidebar-filler">
						<?php
							if( empty( $rightSidebarSlug ) ) {

								include dirname( __FILE__ ) . '/includes/sidebars/left.php';
							}
						?>
					</div>
				<?php } ?>
				<div class="colf colf-sidebar-filler <?= $leftSidebar && $rightSidebar ? 'colf12x6' : 'colf12x9' ?>">
					<?php include "$pageIncludes/content.php"; ?>
					<?php include "$pageIncludes/comments.php"; ?>
				</div>
				<?php if( $rightSidebar ) { ?>
					<div class="colf colf12x3">
						<?php
							if( empty( $rightSidebarSlug ) ) {

								include dirname( __FILE__ ) . '/includes/sidebars/right.php';
							}
						?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="row content-90">
				<?php include "$pageIncludes/content.php"; ?>
				<?php include "$pageIncludes/comments.php"; ?>
			</div>
		<?php } ?>
		<?php include "$pageIncludes/blocks.php"; ?>
		<?php include dirname( __FILE__ ) . '/includes/widgets.php'; ?>
	</div>
</div>
