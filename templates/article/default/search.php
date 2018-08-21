<?php
$siteProperties	= $this->context->getSiteProperties();

$model			= $this->params[ 'model' ];
$modelContent	= $model->modelContent;
$featuredModels	= Yii::$app->factory->get( 'articleService' )->getFeatured();

// Config -------------------------

$data			= json_decode(  $model->data );
$settings		= isset( $data->settings ) ? $data->settings : [];
$templateClass	= isset( $modelContent->template ) ? "page-default page-{$modelContent->template->slug}" : 'page-default';

// Sidebars -----------------------

$topSidebar		= !empty( $settings->topSidebar ) ? $settings->topSidebar : false;
$bottomSidebar	= !empty( $settings->bottomSidebar ) ? $settings->bottomSidebar : false;
$leftSidebar	= !empty( $settings->leftSidebar ) ? $settings->leftSidebar : false;
$rightSidebar	= !empty( $settings->rightSidebar ) ? $settings->rightSidebar : false;
$footerSidebar	= !empty( $settings->footerSidebar ) ? $settings->footerSidebar : false;

$pageIncludes	= Yii::getAlias( '@breeze' ) . '/templates/page/default/includes';
$searchIncludes	= Yii::getAlias( '@breeze' ) . '/templates/page/default/search';

$buffer			= "$pageIncludes/buffer.php";
$preObjects		= "$pageIncludes/objects-pre.php";
$innerObjects	= "$pageIncludes/objects-inner.php";
$outerObjects	= "$pageIncludes/objects-outer.php";
?>
<?php include "$pageIncludes/options.php"; ?>
<?php include "$pageIncludes/styles.php"; ?>
<?php include "$pageIncludes/objects-config.php"; ?>
<div <?= $options ?>>
	<?php include"$pageIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$searchIncludes/header.php"; ?>
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
