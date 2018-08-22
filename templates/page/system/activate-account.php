<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

// Form Config
$frmSplit = isset( $frmSplit ) ? $frmSplit : true;

$formModel	= $model;
$formView	= dirname( __FILE__ ) . '/includes/forms/activate-account.php';
$model		= isset( $this->params[ 'model' ] ) ? $this->params[ 'model' ] : ContentUtil::findPage( $this );

$siteProperties = $this->context->getSiteProperties();
$modelContent	= $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= isset( $data->settings ) ? $data->settings : [];
$pageBanner	= $siteProperties->getPageBanner();

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
		<div class="row content-90">
			<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
		</div>
		<?php include "$defaultIncludes/blocks.php"; ?>
		<?php include "$defaultIncludes/widgets.php"; ?>
	</div>
</div>
