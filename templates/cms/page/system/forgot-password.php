<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

// Services & Models --------------

$formModel	= $model;
$model		= isset( $this->params[ 'model' ] ) ? $this->params[ 'model' ] : ContentUtil::findPage( $this );

$modelContent = $model->modelContent;

// Config -------------------------

$frmSplit	= isset( $frmSplit ) ? $frmSplit : true;
$frmClass	= isset( $frmClass ) ? $frmClass : 'page-form rounded rounded-medium';
$otp		= isset( $otp ) ? $otp : false;
$otpUrl		= '/reset-password-otp';

$siteProperties = $this->context->getSiteProperties();

$data		= json_decode(  $model->data );
$settings	= isset( $data->settings ) ? $data->settings : [];
$pageBanner	= $siteProperties->getPageBanner();

// Includes -----------------------

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/page/default/includes';
$sliderIncludes		= null;
$elementIncludes	= null;
$widgetIncludes		= null;
$blockIncludes		= null;
$systemIncludes		= isset( $systemIncludes ) ? $systemIncludes : Yii::getAlias( '@breeze' ) . '/templates/cms/page/system/includes';
$systemContent		= isset( $systemContent ) ? $systemContent : "$systemIncludes/content.php";

$formView = "$systemIncludes/forms/forgot-password.php";

// Partials -----------------------

$buffer			= "$defaultIncludes/buffer.php";
$preObjects		= "$defaultIncludes/objects-pre.php";
$innerObjects	= "$defaultIncludes/objects-inner.php";
$outerObjects	= "$defaultIncludes/objects-outer.php";

// Sidebars -----------------------

$topSidebar		= isset( $settings->topSidebar ) ? $settings->topSidebar : false;
$bottomSidebar	= isset( $settings->bottomSidebar ) ? $settings->bottomSidebar : false;
$leftSidebar	= isset( $settings->leftSidebar ) ? $settings->leftSidebar : false;
$rightSidebar	= isset( $settings->rightSidebar ) ? $settings->rightSidebar : false;
$footerSidebar	= isset( $settings->footerSidebar ) ? $settings->footerSidebar : false;
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
					<?php include $systemContent; ?>
				</div>
				<?php if( $rightSidebar ) { ?>
					<div class="colf colf12x3">
						<?php include "$defaultIncludes/sidebars/right.php"; ?>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="page-content-row row">
				<?php include $systemContent; ?>
			</div>
		<?php } ?>
		<?php include $outerObjects; ?>
		<?php if( $bottomSidebar ) { ?>
			<?php include "$defaultIncludes/sidebars/bottom.php"; ?>
		<?php } ?>
	</div>
</div>
<?php
include "$defaultIncludes/scripts.php";
