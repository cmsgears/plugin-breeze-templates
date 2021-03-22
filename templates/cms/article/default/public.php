<?php
// Services & Models --------------

$modelContent = $model->modelContent;

// Config -------------------------

$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$data		= json_decode( $model->data );
$settings	= isset( $data->settings ) ? $data->settings : [];

$author = $model->creator;

// Includes -----------------------

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/page/default/includes';
$templateIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/article/default/includes';
$sliderIncludes		= null;
$socialIncludes		= null;
$elementIncludes	= null;
$widgetIncludes		= null;
$blockIncludes		= null;
$fileIncludes		= null;

// Partials -----------------------

$buffer			= "$defaultIncludes/buffer.php";
$preObjects		= "$defaultIncludes/objects-pre.php";
$innerObjects	= "$defaultIncludes/objects-inner.php";
$outerObjects	= "$defaultIncludes/objects-outer.php";

// Sidebars -----------------------

$topSidebar		= !empty( $settings->topSidebar ) ? $settings->topSidebar : false;
$bottomSidebar	= !empty( $settings->bottomSidebar ) ? $settings->bottomSidebar : false;
$leftSidebar	= !empty( $settings->leftSidebar ) ? $settings->leftSidebar : false;
$rightSidebar	= !empty( $settings->rightSidebar ) ? $settings->rightSidebar : false;
$footerSidebar	= !empty( $settings->footerSidebar ) ? $settings->footerSidebar : false;
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
			<div class="page-content-row row max-cols-100">
				<?php if( $leftSidebar ) { ?>
					<div class="colf colf12x3 colf-sidebar-filler">
						<?php include "$defaultIncludes/sidebars/left.php"; ?>
					</div>
				<?php } ?>
				<div class="colf colf-sidebar-filler <?= $leftSidebar && $rightSidebar ? 'colf12x6' : 'colf12x9' ?>">
					<div class="row">
						<div class="colf colf12x4 align align-center">
							<?php include "$templateIncludes/includes/author.php"; ?>
						</div>
						<div class="colf colf12x8">
							<?php include "$defaultIncludes/content.php"; ?>
						</div>
					</div>
					<?php include "$defaultIncludes/comments.php"; ?>
				</div>
				<?php if( $rightSidebar ) { ?>
					<div class="colf colf12x3">
						<?php include "$defaultIncludes/sidebars/right.php"; ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="page-content-row row">
				<div class="row">
					<div class="colf colf12x4 align align-center">
						<?php include "$templateIncludes/includes/author.php"; ?>
					</div>
					<div class="colf colf12x8">
						<?php include "$defaultIncludes/content.php"; ?>
					</div>
				</div>
				<?php include "$defaultIncludes/comments.php"; ?>
			</div>
		<?php } ?>
		<?php include $outerObjects; ?>
		<?php if( $bottomSidebar ) { ?>
			<?php include "$defaultIncludes/sidebars/bottom.php"; ?>
		<?php } ?>
	</div>
</div>
<?php include "$defaultIncludes/scripts.php"; ?>
