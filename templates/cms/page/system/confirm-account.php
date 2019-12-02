<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

// Services & Models --------------

$model = isset( $this->params[ 'model' ] ) ? $this->params[ 'model' ] : ContentUtil::findPage( $this );

$modelContent = $model->modelContent;

// Config -------------------------

$siteProperties = $this->context->getSiteProperties();

$data		= json_decode(  $model->data );
$settings	= isset( $data->settings ) ? $data->settings : [];
$pageBanner	= $siteProperties->getPageBanner();

// Includes -----------------------

$defaultIncludes	= Yii::getAlias( '@breeze' ) . '/templates/cms/page/default/includes';
$elementIncludes	= null;
$widgetIncludes		= null;
$blockIncludes		= null;
$systemIncludes		= isset( $systemIncludes ) ? $systemIncludes : Yii::getAlias( '@breeze' ) . '/templates/cms/page/system/includes';
$systemContent		= isset( $systemContent ) ? $systemContent : "$systemIncludes/content.php";

$formView = "$systemIncludes/forms/confirm-account.php";

// Partials -----------------------

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
		<div class="row content-80">
			<?php include $systemContent; ?>
		</div>
		<?php include $outerObjects; ?>
	</div>
</div>
<?php
include "$defaultIncludes/scripts.php";
