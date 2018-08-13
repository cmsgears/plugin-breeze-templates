<?php
$siteProperties	= $this->context->getSiteProperties();

$model			= $this->params[ 'model' ];
$modelContent	= $model->modelContent;

// Config -------------------------

$data			= json_decode(  $model->data );
$settings		= $data->settings ?? null;
$templateClass	= isset( $modelContent->template ) ? "page-default page-{$modelContent->template->slug}" : 'page-default';

// Sidebars -----------------------

$topSidebar		= isset( $settings ) && !empty( $settings->topSidebar ) ? $settings->topSidebar : false;
$bottomSidebar	= isset( $settings ) && !empty( $settings->bottomSidebar ) ? $settings->bottomSidebar : false;
$leftSidebar	= isset( $settings ) && !empty( $settings->leftSidebar ) ? $settings->leftSidebar : false;
$rightSidebar	= isset( $settings ) && !empty( $settings->rightSidebar ) ? $settings->rightSidebar : false;
$footerSidebar	= isset( $settings ) && !empty( $settings->footerSidebar ) ? $settings->footerSidebar : false;

$pageIncludes = Yii::getAlias( '@breeze' ) . '/templates/page/default/includes';

$buffer			= "$pageIncludes/buffer.php";
$innerObjects	= "$pageIncludes/objects-inner.php";
$outerObjects	= "$pageIncludes/objects-outer.php";
?>
<?php include "$pageIncludes/styles.php"; ?>
<div id="page-<?= $model->slug ?>" class="page page-basic page-search <?= $templateClass ?> page-<?= $model->slug ?>" cmt-block="block-half-auto">
	<?php include"$pageIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include dirname( __FILE__ ) . '/search/header.php'; ?>
		<?php if( $topSidebar ) { ?>
			<?php include "$pageIncludes/sidebars/top.php"; ?>
		<?php } ?>
		<?php if( $leftSidebar || $rightSidebar ) { ?>
			<div class="page-content-row row content-90 max-cols-100">
				<?php if( $leftSidebar ) { ?>
					<div class="colf colf12x3 colf-sidebar-filler">
						<?php include "$pageIncludes/sidebars/left.php"; ?>
					</div>
				<?php } ?>
				<div class="colf colf-sidebar-filler <?= $leftSidebar && $rightSidebar ? 'colf12x6' : 'colf12x9' ?>">
					<?php include dirname( __FILE__ ) . '/search/content.php'; ?>
				</div>
				<?php if( $rightSidebar ) { ?>
					<div class="colf colf12x3">
						<?php "$pageIncludes/sidebars/right.php"; ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="page-content-row row content-90">
				<?php include dirname( __FILE__ ) . '/search/content.php'; ?>
			</div>
		<?php } ?>
		<?php include $outerObjects; ?>
		<?php if( $bottomSidebar ) { ?>
			<?php include "$pageIncludes/sidebars/bottom.php"; ?>
		<?php } ?>
	</div>
</div>
