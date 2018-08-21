<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;

$formView	= dirname( __FILE__ ) . '/includes/forms/confirm-account.php';
$model		= isset( $this->params[ 'model' ] ) ? $this->params[ 'model' ] : ContentUtil::findPage( $this );

$siteProperties = $this->context->getSiteProperties();
$modelContent	= $model->modelContent;

$data		= json_decode(  $model->data );
$settings	= isset( $data->settings ) ? $data->settings : [];
$pageBanner	= $siteProperties->getPageBanner();

$pageIncludes = Yii::getAlias( '@breeze' ) . '/templates/page/default/includes';

$buffer			= "$pageIncludes/buffer.php";
$preObjects		= "$pageIncludes/objects-pre.php";
$innerObjects	= "$pageIncludes/objects-inner.php";
$outerObjects	= "$pageIncludes/objects-outer.php";
?>
<?php include "$pageIncludes/options.php"; ?>
<?php include "$pageIncludes/styles.php"; ?>
<?php include "$pageIncludes/objects-config.php"; ?>
<div <?= $options ?>>
	<?php include "$pageIncludes/background.php"; ?>
	<div class="page-content-wrap">
		<?php include "$pageIncludes/header.php"; ?>
		<div class="row content-90">
			<?php include dirname( __FILE__ ) . '/includes/content.php'; ?>
		</div>
		<?php include "$pageIncludes/blocks.php"; ?>
		<?php include "$pageIncludes/widgets.php"; ?>
	</div>
</div>
