<?php
$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent = $model->modelContent;

// Config -------------------------

$data			= json_decode( $model->data );
$settings		= isset( $data->settings ) ? $data->settings : [];
$templateClass	= isset( $modelContent->template ) ? "page-default page-{$modelContent->template->slug}" : 'page-default';

// Sidebars -----------------------

$topSidebar		= !empty( $settings->topSidebar ) ? $settings->topSidebar : false;
$bottomSidebar	= !empty( $settings->bottomSidebar ) ? $settings->bottomSidebar : false;
$leftSidebar	= !empty( $settings->leftSidebar ) ? $settings->leftSidebar : false;
$rightSidebar	= !empty( $settings->rightSidebar ) ? $settings->rightSidebar : false;
$footerSidebar	= !empty( $settings->footerSidebar ) ? $settings->footerSidebar : false;

$defaultIncludes = Yii::getAlias( '@breeze' ) . '/templates/page/default/includes';

$buffer			= "$defaultIncludes/buffer.php";
$preObjects		= "$defaultIncludes/objects-pre.php";
$innerObjects	= "$defaultIncludes/objects-inner.php";
$outerObjects	= "$defaultIncludes/objects-outer.php";
?>
<?php include "$defaultIncludes/options.php"; ?>
<?php include "$defaultIncludes/styles.php"; ?>
<?php include "$defaultIncludes/objects-config.php"; ?>
<div <?= $options ?>>
	<?php include "$defaultIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$defaultIncludes/header.php"; ?>
		<?php if( $topSidebar ) { ?>
			<?php include "$defaultIncludes/sidebars/top.php"; ?>
		<?php } ?>
		<?php if( $leftSidebar || $rightSidebar ) { ?>
			<div class="page-content-row row content-90 max-cols-100">
				<?php if( $leftSidebar ) { ?>
					<div class="colf colf12x3 colf-sidebar-filler">
						<?php include "$defaultIncludes/sidebars/left.php"; ?>
					</div>
				<?php } ?>
				<div class="colf colf-sidebar-filler <?= $leftSidebar && $rightSidebar ? 'colf12x6' : 'colf12x9' ?>">
					<?php include "$defaultIncludes/content.php"; ?>
					<?php include "$defaultIncludes/comments.php"; ?>
				</div>
				<?php if( $rightSidebar ) { ?>
					<div class="colf colf12x3">
						<?php include "$defaultIncludes/sidebars/right.php"; ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="page-content-row row content-90">
				<?php include "$defaultIncludes/content.php"; ?>
				<?php include "$defaultIncludes/comments.php"; ?>
			</div>
		<?php } ?>
		<?php include $outerObjects; ?>
		<?php if( $bottomSidebar ) { ?>
			<?php include "$defaultIncludes/sidebars/bottom.php"; ?>
		<?php } ?>
	</div>
</div>
